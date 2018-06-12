<?php

namespace Creativestyle\ContentConstructor;

abstract class AbstractComponent
{
    private $identities = [];

    /**
     * @var \Creativestyle\ContentConstructor\View\Template
     */
    protected $template;

    /**
     * @var \Creativestyle\ContentConstructor\View\TemplateLocator
     */
    protected $locator;

    public function __construct(
        \Creativestyle\ContentConstructor\View\Template $twig,
        \Creativestyle\ContentConstructor\View\TemplateLocator $locator
    )
    {
        $this->template = $twig;
        $this->locator = $locator;
    }

    public function getTemplatePath($configuration) {
        if(isset($configuration['template'])) {
            return $configuration['template'];
        }

        return $this->getDefaultTemplatePath();
    }

    public function setIdentities($identities)
    {
        $this->identities = $identities;
    }

    public function getIdentities()
    {
        return $this->identities;
    }

    abstract protected function getDefaultTemplatePath();
}