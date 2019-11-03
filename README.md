# Database Cache Driver for Modulus

This package enables your database connection(s) as `cache` drivers.

Install
-------

Require the package with composer:

```
composer require don47/database-cache-driver
```

Install the package:

```
php craftsman plugin:install --class="\Don47\DatabaseCacheDriver\CachePlugin"
```

Register the plugin in the app config file:

```php
'plugins' => [
  Don47\DatabaseCacheDriver\CachePlugin::class,
  ...
],
```

Append a new "fallback" `cache` connection in your cache config file:

```php
'connections' => [
  'fallback' => [
    'driver' => 'database',
    'connection' => 'mysql'
  ],
  ...
],
```

Then run your migrations:

```
php craftsman migrate all
```

Change the default `cache` to `fallback` in the `.env`:

```.env
HIBERNATE_CACHE=fallback
```

> Note: You can use any database connection. To get started, change the `connection` in the `fallback` config, then add `protected $connection = 'connection_name';` in the `_don47_database_cache_driver` migration. Make sure this is done before running `php craftsman migrate all`.

#### Methods

Here are some methods to help you get started.

 Name              | Helper Method                      | Arguments                                        | Return | Description
-------------------|------------------------------------|--------------------------------------------------|--------|------------
`Cache::set()`     | `cache($key, $value, $expiration)` | `string $key, mixed $value, ?Carbon $expiration` | `bool`  | Set or overwrite cache
`Cache::forever()` | `cache($key, $value)`              | `string $key, mixed $value`                      | `bool`  | Cache forever
`Cache::get()`     | `cache($key)`                      | `string $key`                                    | `mixed` | Get cached key
`Cache::has()`     |                                    | `string $key`                                    | `bool`  | Check if item is cached
`Cache::forget()`  |                                    | `string $key`                                    | `bool`  | Remove cached item
`Cache::pull()`    |                                    | `string $key`                                    | `mixed` | Remove cached item


Security
-------

If you discover any security related issues, please email donaldpakkies@gmail.com instead of using the issue tracker.

License
-------

The MIT License (MIT). Please see [License File](LICENSE) for more information.
