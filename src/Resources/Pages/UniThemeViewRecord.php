<?php

namespace Unikia\FilamentUniTheme\Resources\Pages;

use Illuminate\Contracts\Support\Htmlable;
use Filament\Resources\Pages\ViewRecord;

class UniThemeViewRecord extends ViewRecord
{
    use Concerns\HasCustomHeading;

    public function getHeading(): string|Htmlable|null
    {
        return $this->renderIconHeading();
    }
}
