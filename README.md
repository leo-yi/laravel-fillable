# a laravel package show table columns and comment

[中文文档](./README_zh-CN.md)

## Installation

## laravel framework require
- leo-yi/laravel-fillable:^2.0 -> Laravel >= 7.0
- leo-yi/laravel-fillable:^1.0 -> Laravel ^6.0

You can install the package via composer:

Laravel >= 7.0 :
```bash
composer require leo-yi/laravel-fillable --dev
```

Laravel ^6.0 :
```bash
composer require leo-yi/laravel-fillable:1.5 --dev
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Leoyi\LaravelFillable\LaravelFillableServiceProvider" --tag="laravel-fillable"
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

### First model: columns with table comment
```shell
php artisan fillable table_name 1
```

```php
'id' => 'ID',
'name' => '名称',
'age' => '年龄',
'created_at' => '',
```
### Second model: table comment for array key comment
```shell
php artisan fillable table_name 2
```

```php
'id' => '', // ID
'name' => '', // 名称
'age' => '', // 年龄
'created_at' => '', // 创建时间
```

### Third model: Generates an array of key-value pairs, excluding comments
```shell
php artisan fillable table_name 3
```

```php
'id' => $this->id,
'name' => $this->name,
'age' => $this->age,
'created_at' => $this->created_at,
```

### Third model: Generates an array of key-value pairs, including comments
```shell
php artisan fillable table_name 4
```

```php
'id' => $this->id, // ID
'name' => $this->name, // 名称
'age' => $this->age, // 年龄
'created_at' => $this->created_at, // 创建时间
```

### Fourth mode: model comment for phpstorm
```shell
php artisan fillable table_name 5
```

```php
* @property bigint $id // Id
* @property string $name // 姓名
* @property int $age // 年龄
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
