<?php

namespace Creativestyle\ContentConstructor\Components\CategoryLinks;

interface DataProvider
{
    public function getCategories($mainCategoryId, $subCategoriesIds);
}