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

### Default model: only columns
```shell
php artisan fillable table_name
```

```php
'id',
'title',
'age',
'created_at',
```

### First Model: columns with table comment
```shell
php artisan fillable table_name 1
```

```php
'id' => 'ID',
'name' => '名称',
'age' => '年龄',
'created_at' => '',
```
### Second Model: table comment for array key comment
```shell
php artisan fillable table_name 2
```

```php
'id' => '', // ID
'name' => '', // 名称
'age' => '', // 年龄
'created_at' => '', // 创建时间
```

### Third Model: table comment for array key comment and bind key
```shell
php artisan fillable table_name 3
```

```php
'id' => $this->id, // ID
'name' => $this->name, // 名称
'age' => $this->age, // 年龄
'created_at' => $this->created_at, // 创建时间
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
