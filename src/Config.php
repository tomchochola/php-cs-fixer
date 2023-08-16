<?php

declare(strict_types=1);

namespace Tomchochola\PhpCsFixer;

use PhpCsFixer\Config as FixerConfig;
use PhpCsFixer\ConfigInterface;
use PhpCsFixer\Finder;

class Config
{
    /**
     * Make config.
     *
     * @param array<string, bool|array<mixed>> $rules
     */
    public static function make(Finder $finder, array $rules): ConfigInterface
    {
        $config = new FixerConfig();

        return $config
            ->setRules($rules)
            ->setRiskyAllowed(true)
            ->setFinder($finder)
            ->setUsingCache(false);
    }
}
