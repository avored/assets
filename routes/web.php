<?php

use Illuminate\Support\Facades\Route;

$baseAdminUrl = config('avored.admin_url');

Route::middleware(['web'])
    ->prefix($baseAdminUrl)
    ->namespace('AvoRed\\Framework')
    ->name('admin.')
    ->group(function () {

        Route::get('js/{key}', [\AvoRed\Assets\Controllers\AssetController::class, 'adminJS'])
            ->name('script');
        Route::get('css/{key}', [\AvoRed\Assets\Controllers\AssetController::class, 'adminCSS'])
            ->name('styles');
    });
