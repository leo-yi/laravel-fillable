# a laravel package show table columns and comment

[![Latest Version on Packagist](https://img.shields.io/packagist/v/leo-yi/laravel-fillable.svg?style=flat-square)](https://packagist.org/packages/leo-yi/laravel-fillable)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/leo-yi/laravel-fillable/Check%20&%20fix%20styling?label=code%20style)](https://github.com/leo-yi/laravel-fillable/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/leo-yi/laravel-fillable.svg?style=flat-square)](https://packagist.org/packages/leo-yi/laravel-fillable)

## Installation

You can install the package via composer:

```bash
composer require leo-yi/laravel-fillable
```

You can publish the config file with:
```bash
php artisan vendor:publish --tag="laravel-fillable-config"
```

## Usage

```php
// only columns
php artisan fillable table_name

'id',
'title',
'age',
'created_at',

// columns with comment
php artisan fillable table_name 1

'id' => 'ID',
'name' => '名称',
'age' => '年龄',
'created_at' => '',
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
