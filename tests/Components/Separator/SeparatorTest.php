<?php

namespace Creativestyle\ContentConstructor\Tests\Components\Separator;

class SeparatorTest extends \PHPUnit\Framework\TestCase
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
     * @var \Creativestyle\ContentConstructor\Components\Separator\Separator
     */
    private $separator;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\TemplateLocator::class)->getMock();

        $this->separator = new \Creativestyle\ContentConstructor\Components\Separator\Separator(
            $this->templateStub,
            $this->locatorStub
        );
    }

    public function testItImplementsComponentInterface() {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\Component::class,$this->separator);
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

        $this->assertEquals(
            'some_value',
              $this->separator->render($componentConfiguration)
        );
    }
}