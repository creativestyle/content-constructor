<?php

namespace Creativestyle\ContentConstructor\Tests\Components\ProductGrid;

class ProductGridTest extends \PHPUnit\Framework\TestCase
{
    protected $mediaResolverStub;

    protected $urlResolverStub;

    /**
     * @var \Creativestyle\ContentConstructor\View\Template|\PHPUnit_Framework_MockObject_MockObject
     */
    private $templateStub;

    /**
     * @var \Creativestyle\ContentConstructor\View\TemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $locatorStub;

    /**
     * @var \Creativestyle\ContentConstructor\Components\ProductCarousel\ProductCarousel
     */
    private $productGrid;

    /**
     * @var \Creativestyle\ContentConstructor\Components\ProductCarousel\DataProvider|\PHPUnit_Framework_MockObject_MockObject
     */
    private $dataProviderStub;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\TemplateLocator::class)->getMock();
        $this->dataProviderStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\Components\ProductCarousel\DataProvider::class)->getMock();
        $this->mediaResolverStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\Service\MediaResolver::class)->getMock();
        $this->urlResolverStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\Service\UrlResolver::class)->getMock();

        $this->productGrid = new \Creativestyle\ContentConstructor\Components\ProductGrid\ProductGrid(
            $this->templateStub,
            $this->locatorStub,
            $this->dataProviderStub,
            $this->mediaResolverStub,
            $this->urlResolverStub
        );
    }

    public function testItImplementsComponentInterface()
    {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\Component::class, $this->productGrid);
    }

    public function testItRendersTemplate() {
        $componentConfiguration = [];

        $this->locatorStub
            ->method('locate')
            ->willReturn('');

        $this->templateStub
            ->method('render')
            ->willReturn('some_value');

        $this->dataProviderStub
            ->method('getProducts')
            ->willReturn([]);

        $this->assertEquals(
            'some_value',
            $this->productGrid->render($componentConfiguration)
        );
    }
}