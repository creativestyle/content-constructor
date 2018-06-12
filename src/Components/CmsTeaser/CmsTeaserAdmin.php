<?php

namespace Creativestyle\ContentConstructor\Components\CmsTeaser;

class CmsTeaserAdmin extends \Creativestyle\ContentConstructor\AbstractAdminComponent
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
     * @var CmsTeaserAdminDataProvider
     */
    private $cmsTeaserAdminDataProvider;

    public function __construct(
        \Creativestyle\ContentConstructor\View\Template $template,
        \Creativestyle\ContentConstructor\View\AdminTemplateLocator $locator,
        \Creativestyle\ContentConstructor\Components\CmsTeaser\CmsTeaserAdminDataProvider $cmsTeaserAdminDataProvider
    )
    {
        $this->template = $template;
        $this->locator = $locator;
        $this->cmsTeaserAdminDataProvider = $cmsTeaserAdminDataProvider;
    }

    public function renderConfigurator()
    {
        return $this->template->render(
            $this->locator->locate('customizations/m2c-cms-pages-teaser-configurator/src/m2c-cms-pages-teaser-configurator.twig'),
            [
                'configuration' => $this->getComponentConfiguration(),
                'cmsTags' => json_encode($this->cmsTeaserAdminDataProvider->getTags())
            ]
        );
    }

    public function renderPreview()
    {

    }
}