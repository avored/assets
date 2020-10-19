<?php

namespace AvoRed\Assets;

use AvoRed\Assets\Support\Contracts\AssetInterface;

class AssetItem implements AssetInterface
{
    /**
     * Key for the asset
     * @var string $path
     */
    public $key;
    
    /**
     * Path for the asset
     * @var string $path
     */
    public $path;

    /**
     * Set/Get Key for the Asset Item
     * @param string|null $key
     * @return self|string
     */
    public function key($key = null)
    {
        if ($key === null) {
            return $this->key;
        }
        $this->key = $key;

        return $this;
    }

    /**
     * Set/Get path for the Asset Item
     * @param string|null $path
     * @return self|string
     */
    public function path($path = null)
    {
        if ($path === null) {
            return $this->path;
        }
        $this->path = $path;

        return $this;
    }
}
