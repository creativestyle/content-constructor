<?php

namespace Creativestyle\ContentConstructor\Tests\Components\ImageTeaser;

class ImageTeaserTest extends \PHPUnit\Framework\TestCase
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
     * @var \Creativestyle\ContentConstructor\Components\ImageTeaser\ImageTeaser
     */
    private $imageTeaser;

    private $mediaResolverStub;

    private $urlResolverStub;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\TemplateLocator::class)->getMock();
        $this->mediaResolverStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\Service\MediaResolver::class)->getMock();
        $this->urlResolverStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\Service\UrlResolver::class)->getMock();

        $this->imageTeaser = new \Creativestyle\ContentConstructor\Components\ImageTeaser\ImageTeaser(
            $this->templateStub,
            $this->locatorStub,
            $this->mediaResolverStub,
            $this->urlResolverStub
        );
    }

    public function testItImplementsComponentInterface()
    {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\Component::class, $this->imageTeaser);
    }

    public function testItRendersTemplate()
    {
        $componentConfiguration = [];

        $this->locatorStub
            ->method('locate')
            ->willReturn('location');

        $this->templateStub
            ->method('render')
            ->willReturn('some_value');

        $this->assertEquals(
            'some_value',
            $this->imageTeaser->render($componentConfiguration)
        );
    }
}