<?php

namespace Creativestyle\ContentConstructor\Tests\Components\CategoryLinks;

class CategoryLinks extends \PHPUnit\Framework\TestCase
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
     * @var \Creativestyle\ContentConstructor\Components\Navigation\Navigation
     */
    private $navigation;

    /**
     * @var \Creativestyle\ContentConstructor\Components\CategoryLinks\DataProvider|\PHPUnit_Framework_MockObject_MockObject
     */
    private $dataProviderStub;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\TemplateLocator::class)->getMock();
        $this->dataProviderStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\Components\CategoryLinks\DataProvider::class)->getMock();

        $this->navigation = new \Creativestyle\ContentConstructor\Components\CategoryLinks\CategoryLinks(
            $this->templateStub,
            $this->locatorStub,
            $this->dataProviderStub
        );
    }

    public function testItImplementsComponentInterface()
    {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\Component::class, $this->navigation);
    }

    public function testItRendersTemplate()
    {
        $componentConfiguration = ['main_category_id' => 1, 'sub_categories_ids' => '1,2,3,4,5'];

        $this->locatorStub
            ->method('locate')
            ->willReturn('');

        $this->templateStub
            ->method('render')
            ->willReturn('some_value');

        $this->dataProviderStub
            ->method('getCategories')
            ->willReturn([]);

        $this->assertEquals(
            'some_value',
            $this->navigation->render($componentConfiguration)
        );
    }
}