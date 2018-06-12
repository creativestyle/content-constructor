<?php

namespace Creativestyle\ContentConstructor\View;

interface AdminTemplateLocator
{
    /**
     * Returns realpath for searched file
     * @param $path
     * @return string
     */
    public function locate($path);
}