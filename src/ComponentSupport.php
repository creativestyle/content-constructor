<?php

namespace Creativestyle\ContentConstructor;

/**
 * Interface returns information if the component is supported in project
 * @package Creativestyle\ContentConstructor
 */
interface ComponentSupport
{
    /**
     * @param string $component component type identifier
     * @return bool
     */
    public function isSupported($component);
}