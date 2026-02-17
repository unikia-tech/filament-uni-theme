# Filament UniTheme

Theme from Unikia products, open sourced!

UniTheme enhances Filament resource pages with a styled page header that displays the resource icon and label inside a gradient badge, giving every page a consistent, polished look out of the box.

## Requirements

- PHP 8.2+
- [Filament](https://filamentphp.com) 4.x or 5.x

## Installation

Install the package via Composer:

```bash
composer require unikia/filament-uni-theme
```

The service provider is auto-discovered by Laravel and registers the view and JS asset automatically — no extra configuration needed.

## Applying UniTheme to your resources

UniTheme ships with four drop-in replacements for Filament's standard resource page base classes:

| Filament class | UniTheme replacement |
|---|---|
| `Filament\Resources\Pages\CreateRecord` | `Unikia\FilamentUniTheme\Resources\Pages\UniThemeCreateRecord` |
| `Filament\Resources\Pages\EditRecord` | `Unikia\FilamentUniTheme\Resources\Pages\UniThemeEditRecord` |
| `Filament\Resources\Pages\ListRecords` | `Unikia\FilamentUniTheme\Resources\Pages\UniThemeListRecords` |
| `Filament\Resources\Pages\ViewRecord` | `Unikia\FilamentUniTheme\Resources\Pages\UniThemeViewRecord` |

Each replacement overrides `getHeading()` to render the resource icon + label as a styled HTML heading.

### Automatic migration with the installer

The package bundles a Rector-powered installer that rewrites all resource page classes in your project automatically.

**1. Install Rector** (dev dependency in your application):

```bash
composer require rector/rector --dev
```

**2. Run the installer:**

```bash
# Scan the default app/ directory
vendor/bin/uni-theme-installer

# Scan a specific path
vendor/bin/uni-theme-installer app/Filament/Resources

# Preview changes without modifying files
vendor/bin/uni-theme-installer --dry-run
```

The installer will find every class that extends one of the four Filament page classes and rewrite both the `extends` clause and the `use` import to point to the UniTheme equivalent.

### Manual migration

If you prefer to migrate a single page by hand, change the `extends` clause and `use` import:

```php
// Before
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    // ...
}

// After
use Unikia\FilamentUniTheme\Resources\Pages\UniThemeCreateRecord;

class CreatePost extends UniThemeCreateRecord
{
    // ...
}
```

Repeat the same pattern for `EditRecord`, `ListRecords`, and `ViewRecord`.

## Manual usage

Implement the trait `Unikia\FilamentUniTheme\Resources\Pages\Concerns\HasCustomHeading` in your page classes.

Add the following code to your page classes:

```php
use Unikia\FilamentUniTheme\Resources\Pages\Concerns\HasCustomHeading;

class Dashboard extends Page
{
    use HasCustomHeading;

    public function getHeading(): string|Htmlable|null
    {
        return $this->renderIconHeading(Heroicon::OutlinedHome, 'Dashboard');
    }
}
```

## What the theme changes

Each UniTheme page class renders a custom heading via the `uni-theme::resource-page-header` Blade view. The heading wraps the resource's navigation icon inside a gradient badge alongside the resource label:

```html
<span class="flex items-center gap-3">
    <span class="flex items-center justify-center h-10 w-10 rounded-lg"
          style="background: linear-gradient(135deg, var(--color-primary-700), var(--color-primary-400));">
        <!-- resource navigation icon -->
    </span>
    Resource Label
</span>
```

The gradient uses your panel's primary colour tokens, so it adapts automatically to any Filament theme.

## License

MIT — see [LICENSE](LICENSE).
