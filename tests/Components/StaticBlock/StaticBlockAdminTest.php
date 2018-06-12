<?php

namespace Creativestyle\ContentConstructor\Tests\AdminComponents;

class StaticBlockTest extends \PHPUnit\Framework\TestCase
{
    private $blocks = [
        ['identifier' => 'first', 'title' => 'First'],
        ['identifier' => 'second', 'title' => 'Second']
    ];

    /**
     * @var \Creativestyle\ContentConstructor\Components\StaticBlock\DataProvider|\PHPUnit_Framework_MockObject_MockObject
     */

    private $dataProviderMock;
    /**
     * @var \Creativestyle\ContentConstructor\View\Template|\PHPUnit_Framework_MockObject_MockObject
     */
    private $templateMock;

    /**
     * @var \Creativestyle\ContentConstructor\View\AdminTemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $locatorMock;

    /**
     * @var \Creativestyle\ContentConstructor\Components\Headline\HeadlineAdmin
     */
    private $staticBlock;


    public function setUp()
    {
        $this->templateMock = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\Template::class)->getMock();
        $this->locatorMock = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\AdminTemplateLocator::class)->getMock();
        $this->dataProviderMock = $this->getMockBuilder(\Creativestyle\ContentConstructor\Components\StaticBlock\DataProvider::class)->getMock();

        $this->staticBlock = new \Creativestyle\ContentConstructor\Components\StaticBlock\StaticBlockAdmin(
            $this->templateMock,
            $this->locatorMock,
            $this->dataProviderMock
        );
    }

    public function testItImplementsAdminComponentInterface() {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\AdminComponent::class,$this->staticBlock);
    }

    public function testItRendersCorrectTemplate()
    {
        $this->locatorMock
            ->method('locate')
            ->willReturn('location');

        $this->templateMock
            ->method('render')
            ->willReturn('rendered_configurator');

        $this->assertEquals(
            'rendered_configurator',
             $this->staticBlock->renderConfigurator()
        );
    }
}