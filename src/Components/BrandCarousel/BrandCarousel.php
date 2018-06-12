<?php

namespace Creativestyle\ContentConstructor\Components\BrandCarousel;

class BrandCarousel extends \Creativestyle\ContentConstructor\AbstractComponent implements \Creativestyle\ContentConstructor\Component
{
    /**
     * @var DataProvider
     */
    private $dataProvider;

    public function __construct(
        \Creativestyle\ContentConstructor\View\Template $template,
        \Creativestyle\ContentConstructor\View\TemplateLocator $locator,
        DataProvider $dataProvider
    )
    {
        parent::__construct($template, $locator);
        $this->dataProvider = $dataProvider;
    }

    /**
     * Renders component with specified configuration
     * @param array $configuration
     * @return string
     */
    public function render(array $configuration)
    {
        $data = array_merge(
            $configuration,
            ['brands' => $this->dataProvider->getBrands()]
        );

        return $this->template->render(
            $this->locator->locate($this->getTemplatePath($configuration)),
            $data
        );
    }

    protected function getDefaultTemplatePath()
    {
        return 'brand-carousel/brand-carousel.twig';
    }
}