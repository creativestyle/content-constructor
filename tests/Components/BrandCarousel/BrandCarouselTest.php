<?php

namespace Creativestyle\ContentConstructor\Tests\Components\BrandCarousel;

class BrandCarouselTest extends \PHPUnit\Framework\TestCase
{
    protected $dataProviderStub;

    /**
     * @var \Creativestyle\ContentConstructor\View\Template|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $templateStub;

    /**
     * @var \Creativestyle\ContentConstructor\View\TemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $locatorStub;

    /**
     * @var \Creativestyle\ContentConstructor\Components\Headline\Headline
     */
    protected $brandCarousel;

    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\TemplateLocator::class)->getMock();
        $this->dataProviderStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\Components\BrandCarousel\DataProvider::class)->getMock();

        $this->brandCarousel = new \Creativestyle\ContentConstructor\Components\BrandCarousel\BrandCarousel(
            $this->templateStub,
            $this->locatorStub,
            $this->dataProviderStub
        );
    }

    public function testItImplementsComponentInterface() {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\Component::class, $this->brandCarousel);
    }

    public function testItRendersTemplate()
    {
        $componentConfiguration = [];

        $this->locatorStub
            ->method('locate')
            ->willReturn('');

        $this->templateStub
            ->method('render')
            ->willReturn('some_value');

        $this->dataProviderStub
            ->method('getBrands')
            ->willReturn([]);

        $this->assertEquals(
            'some_value',
              $this->brandCarousel->render($componentConfiguration)
        );
    }
}