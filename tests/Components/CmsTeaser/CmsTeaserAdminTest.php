<?php

namespace Creativestyle\ContentConstructor\Tests\Components\CmsTeaser;

class CmsTeaserAdminTest extends \PHPUnit\Framework\TestCase
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
     * @var \Creativestyle\ContentConstructor\Components\CmsTeaser\CmsTeaserAdmin
     */
    private $cmsTeaserAdmin;

    /**
     * @var \Creativestyle\ContentConstructor\Components\CmsTeaser\CmsTeaserAdminDataProvider
     */
    private $cmsTeaserAdminDataProvider;


    public function setUp()
    {
        $this->templateMock = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\Template::class)->getMock();
        $this->locatorMock = $this->getMockBuilder(\Creativestyle\ContentConstructor\View\AdminTemplateLocator::class)->getMock();
        $this->cmsTeaserAdminDataProvider = $this->getMockBuilder(\Creativestyle\ContentConstructor\Components\CmsTeaser\CmsTeaserAdminDataProvider::class)->getMock();

        $this->cmsTeaserAdmin = new \Creativestyle\ContentConstructor\Components\CmsTeaser\CmsTeaserAdmin(
            $this->templateMock,
            $this->locatorMock,
            $this->cmsTeaserAdminDataProvider
        );
    }

    public function testItImplementsAdminComponentInterface() {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\AdminComponent::class,$this->cmsTeaserAdmin);
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
            $this->cmsTeaserAdmin->renderConfigurator()
        );
    }
}