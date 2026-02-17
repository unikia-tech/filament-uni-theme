<?php

namespace Unikia\FilamentUniTheme\Rector;

use PhpParser\Node;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Class_;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * Replaces Filament resource page base classes with their UniTheme equivalents:
 *
 *   CreateRecord  => UniThemeCreateRecord
 *   EditRecord    => UniThemeEditRecord
 *   ListRecords   => UniThemeListRecords
 *   ViewRecord    => UniThemeViewRecord
 */
final class ReplaceFilamentPageClassesRule extends AbstractRector
{
    private const MAP = [
        'Filament\Resources\Pages\CreateRecord' => 'Unikia\FilamentUniTheme\Resources\Pages\UniThemeCreateRecord',
        'Filament\Resources\Pages\EditRecord'   => 'Unikia\FilamentUniTheme\Resources\Pages\UniThemeEditRecord',
        'Filament\Resources\Pages\ListRecords'  => 'Unikia\FilamentUniTheme\Resources\Pages\UniThemeListRecords',
        'Filament\Resources\Pages\ViewRecord'   => 'Unikia\FilamentUniTheme\Resources\Pages\UniThemeViewRecord',
    ];

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Replace Filament resource page base classes with UniTheme equivalents.',
            [
                new CodeSample(
                    <<<'PHP'
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord {}
PHP,
                    <<<'PHP'
use Unikia\FilamentUniTheme\Resources\Pages\UniThemeCreateRecord;

class CreatePost extends UniThemeCreateRecord {}
PHP,
                ),
            ]
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [Class_::class];
    }

    /** @param Class_ $node */
    public function refactor(Node $node): ?Node
    {
        if ($node->extends === null) {
            return null;
        }

        $resolvedName = $this->getName($node->extends);

        if ($resolvedName === null || ! array_key_exists($resolvedName, self::MAP)) {
            return null;
        }

        $replacement = self::MAP[$resolvedName];
        $node->extends = new Name\FullyQualified($replacement);

        return $node;
    }
}
