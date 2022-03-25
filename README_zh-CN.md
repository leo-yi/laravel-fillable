# 一个生成数据表字段和注释的 Laravel 扩展包

## 安装

## 框架要生活方式
- leo-yi/laravel-fillable:^2.0 -> Laravel >= 7.0
- leo-yi/laravel-fillable:^1.0 -> Laravel ^6.0

通过 composer 安装:

Laravel 版本大于等于 7.0 :
```bash
composer require leo-yi/laravel-fillable --dev
```

Laravel 版本 6.0 :
```bash
composer require leo-yi/laravel-fillable:1.5 --dev
```

发布配置文件:
```bash
php artisan vendor:publish --provider="Leoyi\LaravelFillable\LaravelFillableServiceProvider" --tag="laravel-fillable"
```

## 使用

### 默认模式: 只有字段名
```shell
php artisan fillable table_name
```

```php
'id',
'title',
'age',
'created_at',
```

### 模式1: 生成数据表字段对注释的 PHP 数组键值对
```shell
php artisan fillable table_name 1
```

```php
'id' => 'ID',
'name' => '名称',
'age' => '年龄',
'created_at' => '创建时间',
```
### 模式2: 生成数据表字段的 PHP 数组键值对, 并添加单行注释为数据表字段对应注释
```shell
php artisan fillable table_name 2
```

```php
'id' => '', // ID
'name' => '', // 名称
'age' => '', // 年龄
'created_at' => '', // 创建时间
```

### 模式3: 生成数据表字段和字段对应的 $this 类型数组键值对, 不添加单行注释, 一般用于 resource 映射
```shell
php artisan fillable table_name 3
```

```php
'id' => $this->id,
'name' => $this->name,
'age' => $this->age,
'created_at' => $this->created_at,
```

### 模式4: 生成数据表字段和字段对应的 $this 类型数组键值对, 并添加单行注释, 一般用于 resource 映射
```shell
php artisan fillable table_name 4
```

```php
'id' => $this->id, // ID
'name' => $this->name, // 名称
'age' => $this->age, // 年龄
'created_at' => $this->created_at, // 创建时间
```

### 模式5:生成 Laravel Model 的类注释, 一般用于 phpstorm 中跳转
```shell
php artisan fillable table_name 5
```

```php
* @property bigint $id // Id
* @property string $name // 姓名
* @property int $age // 年龄
```

## 修改日志

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
