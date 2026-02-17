<?php

namespace Unikia\FilamentUniTheme\Resources\Pages;

use Illuminate\Contracts\Support\Htmlable;
use Filament\Resources\Pages\ListRecords;

class UniThemeListRecords extends ListRecords
{
    use Concerns\HasCustomHeading;

    public function getHeading(): string|Htmlable|null
    {
        return $this->getCustomHeading();
    }
}
