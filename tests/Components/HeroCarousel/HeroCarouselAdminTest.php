<?php

namespace Creativestyle\ContentConstructor\Tests\Components\HeroCarousel;

class HeroCarouselAdminTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Twig_Environment|\PHPUnit_Framework_MockObject_MockObject
     */
    private $templateStub;

    /**
     * @var \Creativestyle\ContentConstructor\View\AdminTemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $locatorStub;

    /**
     * @var \Creativestyle\ContentConstructor\Components\ProductCarousel\ProductCarouselAdmin
     */
    private $headline;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\AdminTemplateLocator::class)->getMock();

        $this->headline = new \Creativestyle\ContentConstructor\Components\HeroCarousel\HeroCarouselAdmin(
            $this->templateStub,
            $this->locatorStub
        );
    }

    public function testItImplementsAdminComponentInterface() {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\AdminComponent::class,$this->headline);
    }

    public function testItRendersCorrectTemplate()
    {
        $this->locatorStub
            ->method('locate')
            ->willReturn('/configurator.twig');

        $this->templateStub
            ->method('render')
            ->willReturn('rendered_template');


        $this->assertEquals(
            'rendered_template',
            $this->headline->renderConfigurator()
        );
    }
}