<?php

namespace AvoRed\Assets;

use Illuminate\Support\Collection;
use Illuminate\View\View;

class AssetsManager
{
    const JS = 'JAVASCRIPT';
    const CSS = 'STYLES';

    /**
     * AvoRed Assets Scripts Collection
     * @var \Illuminate\Support\Collection;
     */
    protected $scripts;

    /**
     * AvoRed Assets Styles Collection
     * @var \Illuminate\Support\Collection;
     */
    protected $styles;

    /**
     * 
     * Construct for the Avored Assets Manager
     * @return void
     */
    public function __construct()
    {
        $this->scripts = new Collection();
        $this->styles = new Collection();
    }

    /**
     * Register Scripts for AvoRed
     * @param string $key
     * @param string $path
     * @return void
     */
    public function registerJS($key, $path)
    {
        $this->register(self::JS, $key, $path);
    }


    public function getJS($key)
    {
        return $this->scripts->get($key);
    }
    public function getCSS($key)
    {
        return $this->styles->get($key);
    }
    
    /**
     * Register Styles for AvoRed
     * @param string $key
     * @param string $path
     * @return void
     */
    public function registerCSS($key, $path)
    {
        $this->register(self::CSS, $key, $path);
    }

    /**
     * Register Styles for AvoRed
     * @return \Illuminate\Support\Collection
     */
    public function renderJS(): View
    {
        return view('avored-assets::js.index')
            ->with('scripts', $this->scripts);
    }

    /**
     * Register Styles for AvoRed
     * @return \Illuminate\Support\Collection
     */
    public function renderCSS(): View
    {
        return view('avored-assets::css.index')
            ->with('styles', $this->styles);
    }

    /**
     * Register Scripts/Styles for AvoRed
     * @param string $type
     * @param string $key
     * @param string $path
     * @return void
     */
    private function register($type, $key, $path): void
    {   
        if ($type === self::JS) {
            $this->scripts->put($key, $path);
        }
        if ($type === self::CSS) {
            $this->styles->put($key, $path);
        }
    }
}
