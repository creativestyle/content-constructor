<?php

namespace Creativestyle\ContentConstructor\Tests\Components\ProductCarousel;

class ProductCarouselTest extends \PHPUnit\Framework\TestCase
{
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
    private $productCarousel;

    /**
     * @var \Creativestyle\ContentConstructor\Components\Navigation\DataProvider|\PHPUnit_Framework_MockObject_MockObject
     */
    private $dataProviderStub;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\TemplateLocator::class)->getMock();
        $this->dataProviderStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\Components\ProductCarousel\DataProvider::class)->getMock();

        $this->productCarousel = new \Creativestyle\ContentConstructor\Components\ProductCarousel\ProductCarousel(
            $this->templateStub,
            $this->locatorStub,
            $this->dataProviderStub
        );
    }

    public function testItImplementsComponentInterface()
    {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\Component::class, $this->productCarousel);
    }

    public function testItRendersTemplate() {
        $componentConfiguration = [];

        $this->locatorStub
            ->method('locate')
            ->willReturn('');

        $this->templateStub
            ->method('render')
            ->willReturn('some_value');

        $this->assertEquals(
            'some_value',
            $this->productCarousel->render($componentConfiguration)
        );
    }
}