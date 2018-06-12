<?php

namespace Creativestyle\ContentConstructor\Components\Separator;

use Creativestyle\ContentConstructor\Component;

class Separator extends \Creativestyle\ContentConstructor\AbstractComponent implements Component
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
        return 'separator/separator.twig';
    }
}
