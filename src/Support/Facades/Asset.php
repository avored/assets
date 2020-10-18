<?php

namespace AvoRed\Assets\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \AvoRed\Assets\AssetManager allJS()
 * @method static \AvoRed\Assets\AssetManager allCSS()
 * @method static \AvoRed\Assets\AssetManager renderJS($key, $path)
 * @method static \AvoRed\Assets\AssetManager renderCSS($key, $path)
 */
class Asset extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'avored_assets';
    }
}
