# Jellyfish Cross Engage Module
[![Build Status](https://travis-ci.org/fond-of/spryker-jellyfish-cross-engage.svg?branch=master)](https://travis-ci.org/fond-of/spryker-jellyfish-cross-engage)
[![PHP from Travis config](https://img.shields.io/travis/php-v/symfony/symfony.svg)](https://php.net/)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/spryker-jellyfish-cross-engange)

## Installation

```
composer require fond-of-spryker/jellyfish-cross-engage
```

##

Register mapping plugin `JellyfishCrossEngangeOrderExpanderPlugin` in `src/Pyz/Zed/Jellyfish/JellyfishDependencyProvider.php`

```
    protected function getJellyfishOrderExpanderPostMapPlugins(): array
    {
        return [
            ...
            new JellyfishCrossEngangeOrderExpanderPlugin(),
        ];
    }
```
