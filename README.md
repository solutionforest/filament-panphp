# This is my package filament-panphp

[![Latest Version on Packagist](https://img.shields.io/packagist/v/solution-forest/filament-panphp.svg?style=flat-square)](https://packagist.org/packages/solution-forest/filament-panphp)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/solution-forest/filament-panphp/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/solution-forest/filament-panphp/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/solution-forest/filament-panphp/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/solution-forest/filament-panphp/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/solution-forest/filament-panphp.svg?style=flat-square)](https://packagist.org/packages/solution-forest/filament-panphp)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require solution-forest/filament-panphp
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-panphp-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-panphp-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-panphp-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentPanphp = new SolutionForest\FilamentPanphp();
echo $filamentPanphp->echoPhrase('Hello, SolutionForest!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [alan](https://github.com/solutionforest)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
