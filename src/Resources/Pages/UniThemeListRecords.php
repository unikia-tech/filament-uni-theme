<?php

namespace Unikia\FilamentUniTheme\Resources\Pages;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use Filament\Resources\Pages\ListRecords;

class UniThemeListRecords extends ListRecords
{
    public function getHeading(): string|Htmlable|null
    {
        return new HtmlString(view('uni-theme::resource-page-header', [
            'icon' => static::getResource()::getNavigationIcon(),
            'label' => static::getResource()::getNavigationLabel(),
            'subheading' => static::getSubheading()
        ])->render());
    }
}
