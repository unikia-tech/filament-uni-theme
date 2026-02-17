<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Unikia\FilamentUniTheme\Rector\ReplaceFilamentPageClassesRule;

/**
 * Rector configuration that replaces Filament resource page base classes
 * with their UniTheme equivalents. Run via:
 *
 *   vendor/bin/uni-theme-upgrade [path]
 */
return RectorConfig::configure()
    ->withRules([
        ReplaceFilamentPageClassesRule::class,
    ]);
