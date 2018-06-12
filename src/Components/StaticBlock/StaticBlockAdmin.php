<?php

namespace Creativestyle\ContentConstructor\Components\StaticBlock;

class StaticBlockAdmin extends \Creativestyle\ContentConstructor\AbstractAdminComponent
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
     * @var DataProvider
     */
    private $dataProvider;

    public function __construct(
        \Creativestyle\ContentConstructor\View\Template $template,
        \Creativestyle\ContentConstructor\View\AdminTemplateLocator $locator,
        \Creativestyle\ContentConstructor\Components\StaticBlock\DataProvider $dataProvider
    ) {
        $this->template = $template;
        $this->locator = $locator;
        $this->dataProvider = $dataProvider;
    }

    public function renderConfigurator()
    {
        return $this->template->render(
            $this->locator->locate('customizations/m2c-static-block-configurator/src/m2c-static-block-configurator.twig'),
            [
                'configuration' => $this->getComponentConfiguration(),
                'blocks' => $this->dataProvider->getBlocks()
            ]
        );
    }

    public function renderPreview()
    {
        
    }
}