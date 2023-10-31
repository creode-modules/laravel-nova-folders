# Allows the folders module to be used with Laravel Nova.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/creode/laravel-nova-folders.svg?style=flat-square)](https://packagist.org/packages/creode/laravel-nova-folders)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/creode-modules/laravel-nova-folders/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/creode-modules/laravel-nova-folders/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/creode/laravel-nova-folders.svg?style=flat-square)](https://packagist.org/packages/creode/laravel-nova-folders)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require creode/laravel-nova-folders
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="nova-folders-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="nova-folders-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="nova-folders-views"
```

## Usage

Handles the registration of the folders module with Laravel Nova. This module is meant to be used as a base to get basic folder functionality working within Laravel Nova but provides very little functionality on its own.

### Registering Custom Resource Actions
You can register custom resource actions to appear on the Folder resource. To do this you need to listen for the `DefineFolderActionsEvent` event and add your actions to the `$actions` array. These just use Nova's standard Actions functionality. For details about defining actions please look at the [Nova documentation](https://nova.laravel.com/docs/4.0/actions/defining-actions.html).

```php
Event::listen(function (DefineFolderActionsEvent $event) {
    $event->actions[] = TestActionClass::make();
});
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Creode](https://github.com/creode-modules)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
