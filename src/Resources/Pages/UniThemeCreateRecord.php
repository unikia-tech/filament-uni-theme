<?php

namespace Unikia\FilamentUniTheme\Resources\Pages;

use Illuminate\Contracts\Support\Htmlable;
use Filament\Resources\Pages\CreateRecord;

class UniThemeCreateRecord extends CreateRecord
{
    use Concerns\HasCustomHeading;

    public function getHeading(): string|Htmlable|null
    {
        return $this->getCustomHeading();
    }
}
