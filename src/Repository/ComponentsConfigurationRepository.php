<?php

namespace Creativestyle\ContentConstructor\Repository;

interface ComponentsConfigurationRepository
{
    public function getByPageId(string $id);
    public function getByPageAndComponentId(string $pageId, string $componentId);
    public function saveByPageId(string $pageId, array $configuration);
}