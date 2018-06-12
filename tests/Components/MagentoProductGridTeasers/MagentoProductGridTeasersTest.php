<?php

namespace Creativestyle\ContentConstructor\Tests\Components\MagentoProductGridTeasers;

use Creativestyle\ContentConstructor\Component;

class MagentoProductGridTeasers extends \PHPUnit\Framework\TestCase
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
     * @var \Creativestyle\ContentConstructor\Components\Headline\HeadlineAdmin
     */
    private $magentoProductGridTeasers;


    public function setUp()
    {
        $this->templateMock = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\Template::class)->getMock();
        $this->locatorMock = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\TemplateLocator::class)->getMock();

        $this->magentoProductGridTeasers = new \Creativestyle\ContentConstructor\Components\MagentoProductGridTeasers\MagentoProductGridTeasers(
            $this->templateMock,
            $this->locatorMock
        );
    }

    public function testItImplementsComponentInterface() {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\Component::class,$this->magentoProductGridTeasers);
    }
}
