<?php

namespace Unikia\FilamentUniTheme\Resources\Pages;

use Illuminate\Contracts\Support\Htmlable;
use Filament\Resources\Pages\EditRecord;

class UniThemeEditRecord extends EditRecord
{
    use Concerns\HasCustomHeading;

    public function getHeading(): string|Htmlable|null
    {
        return $this->renderIconHeading();
    }
}
