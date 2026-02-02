# Filament UI for Pan Analytics

[![Latest Version on Packagist](https://img.shields.io/packagist/v/solution-forest/filament-panphp.svg?style=flat-square)](https://packagist.org/packages/solution-forest/filament-panphp)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/solutionforest/filament-panphp/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/solutionforest/filament-panphp/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/solutionforest/filament-panphp/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/solutionforest/filament-panphp/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/solution-forest/filament-panphp.svg?style=flat-square)](https://packagist.org/packages/solution-forest/filament-panphp)


Seamlessly integrate [pan, the lightweight and privacy-focused PHP product analytics library](https://github.com/panphp/pan), into your Filament admin panel with this powerful UI package.


<img width="646" alt="image" src="https://repository-images.githubusercontent.com/874164775/1d0951e2-4ae8-4d22-9459-8cf381adcaa2">

Key Features:
- Easy-to-use Filament components for visualizing Pan analytics data
- Intuitive interface for managing and configuring tracked elements
- Real-time dashboard for monitoring impressions, hovers, and clicks
- Integration with Filament's existing components and styling

With our Filament UI for Pan, you can:
- Quickly view and analyze data collected via the `data-pan` attribute
- Easily manage allowed analytics and configure tracking limits
- Visualize trends and patterns in user interactions

## Version Compatibility

| Package Version | Filament Version | PHP Version |
|-----------------|------------------|-------------|
| 1.x             | 3.x              | 8.3+        |
| 2.x             | 4.x / 5.x        | 8.2+        |

## Installation

> **Requires [PHP 8.2+](https://php.net/releases/), [Laravel 11.0+](https://laravel.com), and [Filament v4 or v5](https://filamentphp.com)**.

You can install the package via composer:

```bash
composer require solution-forest/filament-panphp
```


## Usage

### 1. Using in Filament Dashboard

<img width="646" alt="image" src="https://github.com/user-attachments/assets/2aa78fb3-0f8c-45fa-85c2-e4e85308b296">


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


### 2. You can use the [Widget in the blade](https://filamentphp.com/docs/4.x/widgets/adding-a-widget-to-a-blade-view)

<img width="1024" alt="image" src="https://github.com/user-attachments/assets/1986acb0-bf6e-4dd6-87bd-c490734c1b24">



```php
<div>
    @livewire(SolutionForest\FilamentPanphp\Components\PanOverview::class)
</div>
```


## Screenshot

<img width="646" alt="image" src="https://github.com/user-attachments/assets/2aa78fb3-0f8c-45fa-85c2-e4e85308b296">
<img width="622" alt="image" src="https://github.com/user-attachments/assets/4cc447d2-8682-47c0-bbc1-4998e2c0a21d">
<img width="597" alt="image" src="https://github.com/user-attachments/assets/5bec9623-179c-4939-91ad-22b27a2cf213">
<img width="1024" alt="image" src="https://github.com/user-attachments/assets/1986acb0-bf6e-4dd6-87bd-c490734c1b24">


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


