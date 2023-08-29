# Tomchochola's PHP CS Fixer

## Overview

This library provides a set of custom PHP CS Fixer rules and introduces helpers to ease its integration into any PHP project. It aims to simplify code quality management and helps your PHP code adhere to coding standards. The library offers essential and strict sets of rules.

## Features

- Easy-to-use API to configure PHP CS Fixer.
- Strict and Essential rule sets included.
- Finder configuration included for customizable file search.

## Requirements

- PHP 8.2+
- Composer 2.5+

## Installation

1. Create a directory `tools/php-cs-fixer` in your project.
2. Inside `tools/php-cs-fixer`, create a `composer.json` file with the following content:

   ```json
   {
     "require": {
       "php": "^8.2"
     },
     "require-dev": {
       "composer/composer": "^2.5",
       "tomchochola/php-cs-fixer": "dev-main"
     },
     "repositories": [
       {
         "type": "git",
         "url": "git@github.com:tomchochola/php-cs-fixer.git"
       }
     ],
     "minimum-stability": "stable",
     "prefer-stable": true,
     "config": {
       "optimize-autoloader": true,
       "preferred-install": "dist",
       "sort-packages": true
     }
   }
   ```

3. Create a `.php-cs-fixer.dist.php` file in your project root with the following content:

   ```php
   <?php

   declare(strict_types=1);

   return Tomchochola\PhpCsFixer\Fixer::strict(__DIR__);
   ```

### Git Configuration

Add the following lines to your `.gitignore` to prevent these files from being versioned:

```
# tools
/tools/*/vendor
/tools/*/composer.lock
```

## Usage

### Makefile for Code Quality Management

Place the following Makefile in your project root:

```makefile
# Default shell
SHELL := /bin/bash

# Variables
MAKE_PHP_8_2_BIN ?= php8.2
MAKE_COMPOSER_2_BIN ?= /usr/local/bin/composer2

MAKE_PHP ?= ${MAKE_PHP_8_2_BIN}
MAKE_COMPOSER ?= ${MAKE_PHP} ${MAKE_COMPOSER_2_BIN}

# Default goal
.DEFAULT_GOAL := assert-never

# Goals
.PHONY: check
check: lint audit

.PHONY: audit
audit: vendor
	${MAKE_COMPOSER} audit

.PHONY: lint
lint: vendor tools
	${MAKE_COMPOSER} validate --strict
	${MAKE_PHP} tools/php-cs-fixer/vendor/bin/php-cs-fixer fix --dry-run --diff

.PHONY: fix
fix: vendor tools
	${MAKE_PHP} tools/php-cs-fixer/vendor/bin/php-cs-fixer fix

.PHONY: composer
composer:
	${MAKE_COMPOSER} install

.PHONY: composer-no-dev
composer-no-dev:
	${MAKE_COMPOSER} install --no-dev -a

.PHONY: clean-composer
clean-composer:
	git clean -xfd vendor composer.lock

.PHONY: update-composer
update-composer: clean-composer
	${MAKE_COMPOSER} update

.PHONY: clean-tools
clean-tools:
	git clean -xfd tools

.PHONY: update-tools
update-tools: clean-tools tools

.PHONY: update
update: update-tools update-composer

.PHONY: clean
clean: clean-tools clean-composer

# Dependencies
tools: tools/php-cs-fixer/vendor/bin/php-cs-fixer

vendor:
	${MAKE_COMPOSER} install

tools/php-cs-fixer/vendor/bin/php-cs-fixer:
	${MAKE_COMPOSER} --working-dir=tools/php-cs-fixer update
```

Run the following to check code quality:

```bash
make check
```

To auto-fix code issues:

```bash
make fix
```

## Practical Usage and Advanced Tips 🤫

For real-world examples and more advanced usages of this library, you may want to check out [Laratchi](https://github.com/tomchochola/laratchi) and [Laratchi Boilerplate](https://github.com/tomchochola/laratchi-boilerplate). The Laratchi library is a robust Laravel framework extension, and Laratchi Boilerplate serves as a ready-to-use boilerplate for kicking off your Laravel-based projects.

## Contributing

Feel free to open issues or PRs if you find any problems or have suggestions.

## License

This library is proprietary software. Unauthorized copying, modification, or distribution is prohibited.
