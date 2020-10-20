<?php

namespace AvoRed\Assets\Controllers;

use AvoRed\Assets\Support\Facades\Asset;

class AssetController
{
    public function adminJS(string $key)
    {
        $asset = Asset::getJS($key);
        $file = $asset->path();

        if ($file === null && !file_exists($file)) {
            throw new \Exception('JS File not found: ' . $file);
        }

        $expires = strtotime('+1 year');
        $lastModified = filemtime($file);
        $cacheControl = 'public, max-age=31536000';

        return response()->file($file, [
            'Content-Type' => 'application/javascript; charset=utf-8',
            'Expires' => $this->httpDate($expires),
            'Cache-Control' => $cacheControl,
            'Last-Modified' => $this->httpDate($lastModified),
        ]);
    }

    public function adminCSS($key)
    {
        $asset = Asset::getCSS($key);
        $file = $asset->path();

        if ($file === null && !file_exists($file)) {
            throw new \Exception('CSS File not found: ' . $file);
        }
        
        $expires = strtotime('+1 year');
        $lastModified = filemtime($file);
        $cacheControl = 'public, max-age=31536000';

        return response()->file($file, [
            'Content-Type' => 'text/css; charset=utf-8',
            'Expires' => $this->httpDate($expires),
            'Cache-Control' => $cacheControl,
            'Last-Modified' => $this->httpDate($lastModified),
        ]);
    }

    protected function httpDate($timestamp)
    {
        return sprintf('%s GMT', gmdate('D, d M Y H:i:s', $timestamp));
    }
}
