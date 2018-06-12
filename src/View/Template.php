<?php

namespace Creativestyle\ContentConstructor\View;

interface Template
{
    public function render(string $templateLocation, array $data);
}