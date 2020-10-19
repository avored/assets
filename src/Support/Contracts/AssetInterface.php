<?php

namespace AvoRed\Assets\Support\Contracts;

interface AssetInterface
{
    /**
     * Set/Get Key for the Asset Item
     * @param string|null $key
     * @return self|string
     */
    public function key($key = null);

    /**
     * Set/Get path for the Asset Item
     * @param string|null $path
     * @return self|string
     */
    public function path($path = null);
}
