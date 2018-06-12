<?php

namespace Creativestyle\ContentConstructor\Tests;

class ComponentManagerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Creativestyle\ContentConstructor\Factory\AdminComponentFactory|\PHPUnit_Framework_MockObject_MockObject
     */

    private $adminComponentFactoryStub;
    /**
     * @var \Creativestyle\ContentConstructor\Repository\ComponentsConfigurationRepository|\PHPUnit_Framework_MockObject_MockObject
     */
    private $componentConfigurationRepositoryStub;
    /**
     * @var \Creativestyle\ContentConstructor\ComponentManager
     */
    private $manager;

    /**
     * @var \Creativestyle\ContentConstructor\AdminComponent|\PHPUnit_Framework_MockObject_MockObject
     */
    private $adminComponentStub;

    public function setUp() {
        $this->adminComponentFactoryStub = $this
            ->getMockBuilder(\Creativestyle\ContentConstructor\Factory\AdminComponentFactory::class)->getMock();
        $this->componentConfigurationRepositoryStub = $this
            ->getMockBuilder(\Creativestyle\ContentConstructor\Repository\ComponentsConfigurationRepository::class)->getMock();

        $this->manager = new \Creativestyle\ContentConstructor\ComponentManager(
            $this->adminComponentFactoryStub,
            $this->componentConfigurationRepositoryStub
        );

        $this->adminComponentStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\AdminComponent::class)->getMock();
    }

    public function testItRendersConfigurationView() {
        $this->adminComponentFactoryStub->method('create')->with('headline')->willReturn($this->adminComponentStub);

        $this->adminComponentStub->method('renderConfigurator')->willReturn('configurator_content');

        $this->assertEquals(
            'configurator_content',
            $this->manager->initializeComponent('headline')->renderConfigurator()
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsExceptionWhenComponentDoesNotExists() {
        $this->adminComponentFactoryStub->method('create')->willReturn(null);

        $this->manager->initializeComponent('not_existing_component');
    }
}
