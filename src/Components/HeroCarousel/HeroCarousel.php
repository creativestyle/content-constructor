<?php

namespace Creativestyle\ContentConstructor\Components\HeroCarousel;

use Creativestyle\ContentConstructor\Component;

class HeroCarousel extends \Creativestyle\ContentConstructor\AbstractComponent implements Component
{
    /**
     * @var \Creativestyle\ContentConstructor\Service\MediaResolver
     */
    private $mediaResolver;

    /**
     * @var \Creativestyle\ContentConstructor\Service\UrlResolver
     */
    private $urlResolver;

    public function __construct(
        \Creativestyle\ContentConstructor\View\Template $template,
        \Creativestyle\ContentConstructor\View\TemplateLocator $locator,
        \Creativestyle\ContentConstructor\Service\MediaResolver $mediaResolver,
        \Creativestyle\ContentConstructor\Service\UrlResolver $urlResolver
    )
    {
        parent::__construct($template, $locator);

        $this->mediaResolver = $mediaResolver;
        $this->urlResolver = $urlResolver;
    }

    public function render(array $configuration)
    {
        $configuration = $this->resolveExternalResources($configuration);

        return $this->template->render(
            $this->locator->locate($this->getTemplatePath($configuration)),
            $configuration
        );
    }

    private function resolveExternalResources($configuration)
    {
        if(!isset($configuration['items'])) {
            return $configuration;
        }

        foreach($configuration['items'] as &$item) {
            if(!empty($item['decodedImage'])) {
                $item['image'] = [
                    'src' => $this->mediaResolver->resolve($item['decodedImage']),
                    'srcSet' => $this->mediaResolver->resolveSrcSet($item['decodedImage']),
                ];
            }

            if(!empty($item['href'])) {
                $item['href'] = $this->urlResolver->resolve($item['href']);
            }
        }

        return $configuration;
    }

    protected function getDefaultTemplatePath()
    {
        return 'hero/hero.twig';
    }
}
