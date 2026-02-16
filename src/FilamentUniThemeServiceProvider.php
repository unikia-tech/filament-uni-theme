<?php

namespace Unikia\FilamentUniTheme;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Assets\Js;

class FilamentUniThemeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'uni-theme');

        FilamentAsset::register([
            Js::make('uni-theme', __DIR__ . '/../resources/js/plugin.js'),
        ]);
    }
}
