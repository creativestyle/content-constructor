<?php

namespace Creativestyle\ContentConstructor\Tests\Components\Button;

class ButtonTest extends \PHPUnit\Framework\TestCase
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
     * @var \Creativestyle\ContentConstructor\Components\Button\Button
     */
    protected $button;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\TemplateLocator::class)->getMock();
        $this->urlResolverStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\Service\UrlResolver::class)->getMock();
        $this->dataProviderStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\Components\Button\DataProvider::class)->getMock();

        $this->button = new \Creativestyle\ContentConstructor\Components\Button\Button(
            $this->templateStub,
            $this->locatorStub,
            $this->urlResolverStub,
            $this->dataProviderStub
        );
    }

    public function testItImplementsComponentInterface()
    {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\Component::class, $this->button);
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

        $this->dataProviderStub
            ->method('addCategoryInformation')
            ->willReturn($componentConfiguration);

        $this->assertEquals(
            'some_value',
            $this->button->render($componentConfiguration)
        );
    }
}