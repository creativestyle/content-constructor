<?php

namespace Creativestyle\ContentConstructor\Components\CustomHtml;

use Creativestyle\ContentConstructor\Component;

class CustomHtml extends \Creativestyle\ContentConstructor\AbstractComponent implements Component
{
    public function render(array $configuration)
    {
        return $this->template->render(
            $this->locator->locate($this->getTemplatePath($configuration)),
            $configuration
        );
    }

    protected function getDefaultTemplatePath()
    {
        return 'custom-html/custom-html.twig';
    }
}
