<?php

namespace Creativestyle\ContentConstructor\Components\ProductCarousel;

class ProductCarouselAdmin extends \Creativestyle\ContentConstructor\AbstractAdminComponent
{
    /**
     * @var \Creativestyle\ContentConstructor\View\Template
     */
    private $template;

    /**
     * @var \Creativestyle\ContentConstructor\View\AdminTemplateLocator
     */
    private $locator;

    /**
     * @var CategoryPickerProvider
     */
    private $categoryPickerProvider;

    public function __construct(
        \Creativestyle\ContentConstructor\View\Template $template,
        \Creativestyle\ContentConstructor\View\AdminTemplateLocator $locator,
        CategoryPickerProvider $categoryPickerProvider
    ) {
        $this->template = $template;
        $this->locator = $locator;
        $this->categoryPickerProvider = $categoryPickerProvider;
    }

    public function renderConfigurator()
    {
        return $this->template->render(
            $this->locator->locate('customizations/m2c-product-carousel-configurator/src/m2c-product-carousel-configurator.twig'),
            [
                'category_picker' => $this->categoryPickerProvider->renderPicker(),
                'configuration' => $this->getComponentConfiguration()
            ]
        );
    }

    public function renderPreview()
    {
        
    }
}