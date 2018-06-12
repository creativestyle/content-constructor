<?php

namespace Creativestyle\ContentConstructor\Tests\Components\CustomHtml;

class CustomHtmlTest extends \PHPUnit\Framework\TestCase
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
     * @var \Creativestyle\ContentConstructor\Components\CustomHtml\CustomHtml
     */
    private $custom;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\TemplateLocator::class)->getMock();

        $this->custom = new \Creativestyle\ContentConstructor\Components\CustomHtml\CustomHtml(
            $this->templateStub,
            $this->locatorStub
        );
    }

    public function testItImplementsComponentInterface() {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\Component::class,$this->custom);
    }

    public function testItRendersTemplate()
    {
        $componentConfiguration = ['main' => 'test'];

        $this->locatorStub
            ->method('locate')
            ->willReturn('');

        $this->templateStub
            ->method('render')
            ->willReturn('some_value');

        $this->assertEquals(
            'some_value',
              $this->custom->render($componentConfiguration)
        );
    }
}