<?php

namespace Creativestyle\ContentConstructor\Components\Button;

use Creativestyle\ContentConstructor\Component;

class Button extends \Creativestyle\ContentConstructor\AbstractComponent implements Component
{
    /**
     * @var \Creativestyle\ContentConstructor\Service\UrlResolver
     */
    private $urlResolver;
    /**
     * @var DataProvider
     */
    private $dataProvider;

    public function __construct(
        \Creativestyle\ContentConstructor\View\Template $template,
        \Creativestyle\ContentConstructor\View\TemplateLocator $locator,
        \Creativestyle\ContentConstructor\Service\UrlResolver $urlResolver,
        DataProvider $dataProvider
    )
    {
        parent::__construct($template, $locator);

        $this->urlResolver = $urlResolver;
        $this->dataProvider = $dataProvider;
    }

    public function render(array $configuration)
    {
        $configuration = $this->dataProvider->addCategoryInformation($configuration);

        if(isset($configuration['target']) and !empty($configuration['target'])) {
            $configuration['target'] = $this->urlResolver->resolve($configuration['target']);
        }

        return $this->template->render(
            $this->locator->locate($this->getTemplatePath($configuration)),
            $configuration
        );
    }

    protected function getDefaultTemplatePath()
    {
        return 'button/button.twig';
    }
}
