<?php

namespace Creativestyle\ContentConstructor\Tests\Components\ProductCarousel;

class ProductCarouselAdminTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Twig_Environment|\PHPUnit_Framework_MockObject_MockObject
     */
    private $templateMock;

    /**
     * @var \Creativestyle\ContentConstructor\View\AdminTemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $locatorMock;

    /**
     * @var \Creativestyle\ContentConstructor\Components\ProductCarousel\ProductCarouselAdmin
     */
    private $headline;

    private $categoryPickerProviderStub;


    public function setUp()
    {
        $this->templateMock = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\Template::class)->getMock();
        $this->locatorMock = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\AdminTemplateLocator::class)->getMock();
        $this->categoryPickerProviderStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\Components\ProductCarousel\CategoryPickerProvider::class)->getMock();

        $this->headline = new \Creativestyle\ContentConstructor\Components\ProductCarousel\ProductCarouselAdmin(
            $this->templateMock,
            $this->locatorMock,
            $this->categoryPickerProviderStub
        );
    }

    public function testItImplementsAdminComponentInterface() {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\AdminComponent::class,$this->headline);
    }

    public function testItRendersCorrectTemplate()
    {
        $this->locatorMock
            ->method('locate')
            ->willReturn('/configurator.twig');

        $this->templateMock
            ->method('render')
            ->willReturn('rendered_template');


        $this->assertEquals(
            'rendered_template',
            $this->headline->renderConfigurator()
        );
    }
}