<?php

declare(strict_types=1);

namespace Tomchochola\PhpCsFixer;

use PhpCsFixer\ConfigInterface;

class Fixer
{
    /**
     * Make strict fixer solution config.
     */
    public static function strict(string $dir): ConfigInterface
    {
        $finder = Finder::make()->in($dir);

        return Config::make($finder, Rules::strict());
    }

    /**
     * Make essential fixer solution config.
     */
    public static function essential(string $dir): ConfigInterface
    {
        $finder = Finder::make()->in($dir);

        return Config::make($finder, Rules::essential());
    }
}
