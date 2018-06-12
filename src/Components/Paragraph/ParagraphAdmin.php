<?php

namespace Creativestyle\ContentConstructor\Components\Paragraph;

class ParagraphAdmin extends \Creativestyle\ContentConstructor\AbstractAdminComponent
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
     * @var WysiwygConfigDataProvider
     */
    private $wysiwygConfigDataProvider;

    public function __construct(
        \Creativestyle\ContentConstructor\View\Template $template,
        \Creativestyle\ContentConstructor\View\AdminTemplateLocator $locator,
        WysiwygConfigDataProvider $wysiwygConfigDataProvider
    )
    {
        $this->template = $template;
        $this->locator = $locator;
        $this->wysiwygConfigDataProvider = $wysiwygConfigDataProvider;
    }

    public function renderConfigurator()
    {
        return $this->template->render(
            $this->locator->locate('customizations/m2c-paragraph-configurator/src/m2c-paragraph-configurator.twig'),
            [
                'configuration' => $this->getComponentConfiguration(),
                'wysiwyg_configuration' => $this->wysiwygConfigDataProvider->getConfig()
            ]
        );
    }

    public function renderPreview()
    {

    }
}