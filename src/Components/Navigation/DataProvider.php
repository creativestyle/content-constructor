<?php

namespace Creativestyle\ContentConstructor\Components\Navigation;

interface DataProvider
{
    public function getNavigationStructure($categoryId);
}