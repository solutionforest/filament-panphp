# Filament UI for Pan Analytics

[![Latest Version on Packagist](https://img.shields.io/packagist/v/solution-forest/filament-panphp.svg?style=flat-square)](https://packagist.org/packages/solution-forest/filament-panphp)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/solution-forest/filament-panphp/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/solution-forest/filament-panphp/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/solution-forest/filament-panphp/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/solution-forest/filament-panphp/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/solution-forest/filament-panphp.svg?style=flat-square)](https://packagist.org/packages/solution-forest/filament-panphp)


Seamlessly integrate [pan, the lightweight and privacy-focused PHP product analytics library](https://github.com/panphp/pan), into your Filament admin panel with this powerful UI package.


<img width="636" alt="image" src="https://github.com/user-attachments/assets/a6599da8-49a8-4794-ae09-1be7a05229a7">

Key Features:
- Easy-to-use Filament components for visualizing Pan analytics data
- Intuitive interface for managing and configuring tracked elements
- Real-time dashboard for monitoring impressions, hovers, and clicks
- Integration with Filament's existing components and styling

With our Filament UI for Pan, you can:
- Quickly view and analyze data collected via the `data-pan` attribute
- Easily manage allowed analytics and configure tracking limits
- Visualize trends and patterns in user interactions

## Installation

> **Requires [PHP 8.3+](https://php.net/releases/), and [Laravel 11.0+](https://laravel.com)**.

You can install the package via composer:

```bash
composer require solution-forest/filament-panphp
```


## Usage

### 1. Using in Filament Dashboard

<img width="636" alt="image" src="https://github.com/user-attachments/assets/a6599da8-49a8-4794-ae09-1be7a05229a7">

```php

use SolutionForest\FilamentPanphp\Components\PanOverview;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->widgets([
            PanOverview::class
        ])
}
```


### 2. You can use the [Widget in the blade](https://filamentphp.com/docs/3.x/widgets/adding-a-widget-to-a-blade-view)

<img width="1585" alt="image" src="https://github.com/user-attachments/assets/a4e1ed7d-752d-4440-831e-dd39eec9d0c2">


```php
<div>
    @livewire(SolutionForest\FilamentPanphp\Components\PanOverview::class)
</div>
```


## Screenshot

<img width="636" alt="image" src="https://github.com/user-attachments/assets/a6599da8-49a8-4794-ae09-1be7a05229a7">
<img width="927" alt="image" src="https://github.com/user-attachments/assets/5554edd2-9caa-46d0-be67-60f5179ec472">
<img width="920" alt="image" src="https://github.com/user-attachments/assets/4870684b-5e62-4834-a4db-89fecf75d199">
<img width="1585" alt="image" src="https://github.com/user-attachments/assets/a4e1ed7d-752d-4440-831e-dd39eec9d0c2">


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

<p align="center"><a href="https://solutionforest.com" target="_blank"><img src="https://github.com/solutionforest/.github/blob/main/docs/images/sf.png?raw=true" width="200"></a></p>

## About Solution Forest

[Solution Forest](https://solutionforest.com) Web development agency based in Hong Kong. We help customers to solve their problems. We Love Open Soruces. 

We have built a collection of best-in-class products:

- [VantagoAds](https://vantagoads.com): A self manage Ads Server, Simplify Your Advertising Strategy.
- [GatherPro.events](https://gatherpro.events): A Event Photos management tools, Streamline Your Event Photos.
- [Website CMS Management](https://filamentphp.com/plugins/solution-forest-cms-website): Website CMS Management


