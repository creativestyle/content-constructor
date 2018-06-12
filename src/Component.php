<?php

namespace Creativestyle\ContentConstructor;

interface Component {
    /**
     * Renders component with specified configuration
     * @param array $configuration
     * @return mixed
     */
    public function render(array $configuration);
}
