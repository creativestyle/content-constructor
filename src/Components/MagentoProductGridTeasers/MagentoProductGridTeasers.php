<?php

namespace Creativestyle\ContentConstructor\Components\MagentoProductGridTeasers;

use Creativestyle\ContentConstructor\Component;

class MagentoProductGridTeasers extends \Creativestyle\ContentConstructor\AbstractComponent implements Component
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
        return 'magento-product-grid-teasers/magento-product-grid-teasers.twig';
    }
}
