<?php

declare(strict_types=1);

namespace Tomchochola\PhpCsFixer;

use PhpCsFixer\Finder as FixerFinder;

class Finder
{
    /**
     * Make finder.
     */
    public static function make(): FixerFinder
    {
        return FixerFinder::create()
            ->ignoreVCSIgnored(true)
            ->ignoreVCS(true)
            ->ignoreDotFiles(false)
            ->notName('*.blade.php');
    }
}
