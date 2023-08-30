🍵 **Tchi Signature**: _"Welcome to the Tchi Universe: The Future of Coding, by Tomáš Chochola."_

# Tomchochola's PHP CS Fixer - A Gateway to Professional PHP Development 🚀

[![PHP 8.2](https://img.shields.io/badge/PHP-8.2-blue.svg)](https://www.php.net/)
[![Laratchi](https://img.shields.io/badge/Laratchi-orange.svg)](https://github.com/tomchochola/laratchi)
[![License](https://img.shields.io/badge/License-Proprietary-red.svg)](LICENSE.md)

> **Pro Tip:** For a full-stack experience with a vast array of enterprise-level features, look no further than our premium projects [Laratchi](https://github.com/tomchochola/laratchi) and [Laratchi Boilerplate](https://github.com/tomchochola/laratchi-boilerplate).

## Introduction

This library is a simplified introduction to the code quality and functionality you'll find in our more advanced [Laratchi](https://github.com/tomchochola/laratchi) and [Laratchi Boilerplate](https://github.com/tomchochola/laratchi-boilerplate) projects. It lays the groundwork for PHP coding standards and serves as a teaser for what you can achieve with Laratchi's feature-rich environment.

## Features

- 🎯 Easy-to-use PHP CS Fixer configurations
- 🛠️ Includes essential and strict rule sets
- 🚀 Ready for seamless integration into any PHP project

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
         "type": "vcs",
         "url": "https://github.com/tomchochola/php-cs-fixer.git"
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

Add these lines to your `.gitignore`:

```bash
# tools
/tools/*/vendor
/tools/*/composer.lock
```

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

## Usage

Run the following to check code quality:

```bash
make check
```

To auto-fix code issues:

```bash
make fix
```

To fully harness the power of our code quality tools and extensive PHP features, visit [Laratchi](https://github.com/tomchochola/laratchi) and [Laratchi Boilerplate](https://github.com/tomchochola/laratchi-boilerplate).

## Why Upgrade to Laratchi? 🔥

Discover how [Laratchi](https://github.com/tomchochola/laratchi) and [Laratchi Boilerplate](https://github.com/tomchochola/laratchi-boilerplate) can elevate your project with a wide range of professional features:

- **Code Quality Tools**: Full PHPStan static analysis on the max level, Prettier code style fixing, and Spectral OpenAPI linting.
- **Beautiful Validation Rule Logic**: Write intuitive and easy-to-manage validation rules.
- **Prebuilt Auth System**: Secure, robust, and ready to use.
- **Database Token Login Features**: Simplify authentication with database-backed tokens.
- **Swagger OpenAPI**: Document your APIs beautifully and efficiently.
- **JSON:API Responses**: Standardized API responses out-of-the-box.
- **Static Type Hinting Everywhere**: Make your code safer and more maintainable.
- **Input Assertion and Parsing**: Validate and sanitize user input effortlessly.
- **No Mixed PHP Types Anywhere**: Strict typing ensures that your code is robust and less error-prone.

## Want the Full Experience?

Unlock the full range of enterprise-level features by diving into [Laratchi](https://github.com/tomchochola/laratchi) and [Laratchi Boilerplate](https://github.com/tomchochola/laratchi-boilerplate).

## 💼 Contact

- 👤 [Tomáš Chochola](mailto:chocholatom1997@gmail.com)
- 📧 [chocholatom1997@gmail.com](mailto:chocholatom1997@gmail.com)

## 🎉 Contributing

Due to the proprietary nature, contributions are not accepted. If you have issues or feature requests, please contact the author.

## ⚖️ License

All rights reserved by Tomáš Chochola. For detailed licensing information, refer to the [License](LICENSE.md) file.

> ⚠️ Disclaimer: Before using, make sure to read the [License](LICENSE.md) and adhere strictly to its terms. Failure to comply will result in license revocation and may attract legal actions.

🔥 **Don't just build applications, build experiences with Tchi.** 🔥
