<?php

namespace Creativestyle\ContentConstructor\Factory;

interface AdminComponentFactory
{
    /**
     * @param $componentName
     * @return \Creativestyle\ContentConstructor\AdminComponent
     */
    public function create(string $componentName);
}