<?php

namespace Creativestyle\ContentConstructor\Components\ProductCarousel;

interface DataProvider
{
    public function getProducts(array $criteria);
}