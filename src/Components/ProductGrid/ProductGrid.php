<?php

namespace Creativestyle\ContentConstructor\Components\ProductGrid;

class ProductGrid extends \Creativestyle\ContentConstructor\AbstractComponent implements \Creativestyle\ContentConstructor\Component
{
    /**
     * If limit is not passed from configurator then 24 products are returned so we can be sure that
     * biggest scenario (4 rows) can be filled with products
     */
    const DEFAULT_PRODUCTS_LIMIT = 24;

    /**
     * @var \Creativestyle\ContentConstructor\Components\ProductCarousel\DataProvider
     */
    private $dataProvider;
    /**
     * @var \Creativestyle\ContentConstructor\Service\MediaResolver
     */
    private $mediaResolver;
    /**
     * @var \Creativestyle\ContentConstructor\Service\UrlResolver
     */
    private $urlResolver;

    public function __construct(
        \Creativestyle\ContentConstructor\View\Template $template,
        \Creativestyle\ContentConstructor\View\TemplateLocator $locator,
        \Creativestyle\ContentConstructor\Components\ProductCarousel\DataProvider $dataProvider,
        \Creativestyle\ContentConstructor\Service\MediaResolver $mediaResolver,
        \Creativestyle\ContentConstructor\Service\UrlResolver $urlResolver
    )
    {
        parent::__construct($template, $locator);

        $this->dataProvider = $dataProvider;
        $this->mediaResolver = $mediaResolver;
        $this->urlResolver = $urlResolver;
    }

    /**
     * Renders component with specified configuration
     * @param array $configuration
     * @return mixed
     */
    public function render(array $configuration)
    {
        $configuration['limit'] = (isset($configuration['limit']) and is_numeric($configuration['limit'])) ? (int)$configuration['limit'] : self::DEFAULT_PRODUCTS_LIMIT;

        $products = $this->dataProvider->getProducts($configuration);

        $identities = array_column($products, 'identities');
        $this->setIdentities($identities);

        $configuration['products'] = $products;

        if(isset($configuration['hero']['href']) and !empty($configuration['hero']['href'])) {
            $configuration['hero']['href'] = $this->urlResolver->resolve($configuration['hero']['href']);
        }

        if(!empty($configuration['hero']['decoded_image'])) {
            $configuration['hero']['image'] = [
                'src' => $this->mediaResolver->resolve($configuration['hero']['decoded_image']),
                'srcSet' => $this->mediaResolver->resolveSrcSet($configuration['hero']['decoded_image'])
            ];
        }

        return $this->template->render(
            $this->locator->locate($this->getTemplatePath($configuration)),
            $configuration
        );
    }

    protected function getDefaultTemplatePath()
    {
        return 'products-grid/products-grid.twig';
    }
}
