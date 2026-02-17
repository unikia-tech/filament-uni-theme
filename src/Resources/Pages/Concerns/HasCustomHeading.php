<?php

namespace Unikia\FilamentUniTheme\Resources\Pages\Concerns;

use BackedEnum;
use Illuminate\Support\HtmlString;

trait HasCustomHeading
{
    protected function renderIconHeading(
        null | string | BackedEnum $icon = null,
        ?string $label = null,
        ?string $subheading = null
    ): null | string | HtmlString {
        return new HtmlString(view('uni-theme::resource-page-header', [
            'icon' => $icon ?? static::getResource()::getNavigationIcon(),
            'label' => $label ?? static::getResource()::getNavigationLabel(),
            'subheading' => $subheading ?? static::getSubheading()
        ])->render());
    }
}
