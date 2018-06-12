<?php

namespace Creativestyle\ContentConstructor\Tests\Components\MagentoProductGridTeasers;

class MagentoProductGridTeasersAdminTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Twig_Environment|\PHPUnit_Framework_MockObject_MockObject
     */
    private $templateMock;

    /**
     * @var \Creativestyle\ContentConstructor\View\TemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $locatorMock;

    /**
     * @var \Creativestyle\ContentConstructor\Components\MagentoProductGridTeasers\MagentoProductGridTeasersAdmin
     */
    private $magentoProductGridTeasers;


    public function setUp()
    {
        $this->templateMock = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\Template::class)->getMock();
        $this->locatorMock = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\AdminTemplateLocator::class)->getMock();

        $this->magentoProductGridTeasers = new \Creativestyle\ContentConstructor\Components\MagentoProductGridTeasers\MagentoProductGridTeasersAdmin(
            $this->templateMock,
            $this->locatorMock
        );
    }

    public function testItImplementsAdminComponentInterface() {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\AdminComponent::class,$this->magentoProductGridTeasers);
    }
}