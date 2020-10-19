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

    public function getJS($key)
    {
        $index = $this->scripts->search(function($item) use ($key) {
            return $item->key() === $key;
        });
        return $this->scripts->get($index);
    }
    public function getCSS($key)
    {
        $index = $this->styles->search(function($item) use ($key) {
            return $item->key() === $key;
        });
        return $this->styles->get($index);
    }
    
    /**
     * Register Scripts for AvoRed
     * @param callable $path
     * @return void
     */
    public function registerJS($item)
    {
        $asset = new AssetItem();
        $item($asset);

        $this->register(self::JS, $asset);
    }

    /**
     * Register Styles for AvoRed
     * @param callable $item
     * @return void
     */
    public function registerCSS($item)
    {
        $asset = new AssetItem();
        $item($asset);
        $this->register(self::CSS, $asset);
    }

    /**
     * Register Styles for AvoRed
     * @return \Illuminate\Support\Collection
     */
    public function renderJS(): View
    {
        // dd($this->scripts);
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
    private function register($type, $item): void
    {   
        if ($type === self::JS) {
            $this->scripts->push($item);
        }
        if ($type === self::CSS) {
            $this->styles->push($item);
        }
    }
}
