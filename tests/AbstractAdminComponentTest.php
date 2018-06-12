<?php

namespace Creativestyle\ContentConstructor\Tests;


class AbstractAdminComponentTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Creativestyle\ContentConstructor\AbstractAdminComponent
     */
    private $abstractAdminComponent;

    public function setUp()
    {
        $this->abstractAdminComponent = $this->getMockForAbstractClass(\Creativestyle\ContentConstructor\AbstractAdminComponent::class);
    }

    public function testDefaultComponentConfigurationIsEmptyArray()
    {
        $this->assertEquals([], $this->abstractAdminComponent->getComponentConfiguration());
    }

    public function testItSetsProperlyConfiguration()
    {
        $componentConfiguration = ['tag' => 'h1', 'main' => 'Main Title'];

        $this->abstractAdminComponent->setComponentConfiguration($componentConfiguration);

        $this->assertEquals($componentConfiguration, $this->abstractAdminComponent->getComponentConfiguration());
    }
}