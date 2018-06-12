<?php

namespace Creativestyle\ContentConstructor\Components\ProductGrid;

class ProductGridAdmin extends \Creativestyle\ContentConstructor\AbstractAdminComponent
{
    /**
     * @var \Creativestyle\ContentConstructor\View\Template
     */
    private $template;

    /**
     * @var \Creativestyle\ContentConstructor\View\AdminTemplateLocator
     */
    private $locator;

    public function __construct(
        \Creativestyle\ContentConstructor\View\Template $template,
        \Creativestyle\ContentConstructor\View\AdminTemplateLocator $locator
    ) {
        $this->template = $template;
        $this->locator = $locator;
    }

    public function renderConfigurator()
    {
        return $this->template->render(
            $this->locator->locate('customizations/m2c-products-grid-configurator/src/m2c-products-grid-configurator.twig'),
            [
                'configuration' => $this->getComponentConfiguration()
            ]
        );
    }

    public function renderPreview()
    {
        
    }
}