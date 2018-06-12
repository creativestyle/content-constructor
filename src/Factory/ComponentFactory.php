<?php

namespace Creativestyle\ContentConstructor\Factory;

interface ComponentFactory
{
    /**
     * @param $componentName
     * @return \Creativestyle\ContentConstructor\Component
     */
    public function create(string $componentName);
}