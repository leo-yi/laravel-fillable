# a laravel package show table columns and comment

## Installation

You can install the package via composer:

```bash
composer require leo-yi/laravel-fillable --dev
```

You can publish the config file with:
```bash
php artisan vendor:publish --tag="fillable-config"
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
