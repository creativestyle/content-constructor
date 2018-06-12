<?php

namespace Creativestyle\ContentConstructor\Tests\Components\CustomHtml;

class CustomHtmlAdminTest extends \PHPUnit\Framework\TestCase
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
     * @var \Creativestyle\ContentConstructor\Components\CustomHtml\CustomHtmlAdmin
     */
    private $headline;


    public function setUp()
    {
        $this->templateMock = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\Template::class)->getMock();
        $this->locatorMock = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\AdminTemplateLocator::class)->getMock();

        $this->headline = new \Creativestyle\ContentConstructor\Components\CustomHtml\CustomHtmlAdmin(
            $this->templateMock,
            $this->locatorMock
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