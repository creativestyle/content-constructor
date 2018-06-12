<?php

namespace Creativestyle\ContentConstructor\View;

interface TemplateLocator
{
    /**
     * Returns realpath for searched file
     * @param $path
     * @return string
     */
    public function locate($path);
}