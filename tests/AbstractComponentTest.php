<?php

namespace Creativestyle\ContentConstructor\Tests;

class AbstractComponentTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Creativestyle\ContentConstructor\AbstractComponent
     */
    private $abstractComponent;

    public function setUp() {
        $this->abstractComponent = $this
            ->getMockBuilder(\Creativestyle\ContentConstructor\AbstractComponent::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
    }

    public function testItReturnsOverridenTemplatePath() {
        $this->assertEquals(
            'overriden.twig',
            $this->abstractComponent->getTemplatePath(['template' => 'overriden.twig'])
        );
    }

    public function testItReturnsDefaultTemplatePath() {
        $this->abstractComponent
            ->method('getDefaultTemplatePath')
            ->will($this->returnValue('default_template.twig'));

        $this->assertEquals(
            'default_template.twig',
            $this->abstractComponent->getTemplatePath([])
        );
    }
}