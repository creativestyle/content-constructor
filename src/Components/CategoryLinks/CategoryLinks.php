<?php

namespace Creativestyle\ContentConstructor\Components\CategoryLinks;

class CategoryLinks extends \Creativestyle\ContentConstructor\AbstractComponent implements \Creativestyle\ContentConstructor\Component
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
        try {
            $configuration['categories'] = $this->dataProvider->getCategories(
                $configuration['main_category_id'],
                explode(',', $configuration['sub_categories_ids'])
            );

            return $this->template->render(
                $this->locator->locate($this->getTemplatePath($configuration)),
                $configuration
            );
        }
        catch(\Exception $e) {
            return '';
        }
    }

    protected function getDefaultTemplatePath()
    {
        return 'category-links/category-links.twig';
    }
}