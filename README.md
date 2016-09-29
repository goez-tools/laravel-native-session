# Laravel-Native-Session

Laravel session driver for PHP native session.

Inspired from [stechstudio/laravel-raw-sessions](https://github.com/stechstudio/laravel-raw-sessions). 

## You might not need this package

This package only for migration from legacy project, you should not use it in your new project. 

## Install

To get the latest version of laravel-native-session, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require goez/laravel-native-session
```

Instead, you may of course manually update your require block and run composer update if you so choose:

```json
{
    "require": {
        "goez/laravel-native-session": "^1.0"
    }
}
```

Include the service provider within `config/app.php`.

```php
'providers' => [
    ...
    Goez\LaravelNativeSession\ServiceProvider::class,
    ...
];
```

Finally, change the session cookie name in `config/session.php` (same as `session.name` in `php.ini`):

```php
return [
    ...
    'cookie' => 'PHPSESSID',
    ...
];
```

## License

MIT
