# Laravel Markdown Content

[![Current Release](https://img.shields.io/github/release/ohseesoftware/laravel-markdown-content.svg?style=flat-square)](https://github.com/ohseesoftware/laravel-markdown-content/releases)
![Build Status Badge](https://github.com/ohseesoftware/laravel-markdown-content/workflows/Build/badge.svg)
[![Downloads](https://img.shields.io/packagist/dt/ohseesoftware/laravel-markdown-content.svg?style=flat-square)](https://packagist.org/packages/ohseesoftware/laravel-markdown-content)
[![MIT License](https://img.shields.io/github/license/ohseesoftware/laravel-markdown-content.svg?style=flat-square)](https://github.com/ohseesoftware/laravel-markdown-content/blob/master/LICENSE)

## Overview

Laravel Markdown Content is an opinionated package that aims to make adding markdown generated pages to your site a breeze. It follows the same idea as, and was heavily inspired by [Laravel Pages](https://github.com/archtechx/laravel-pages).

Out of the box, Laravel Markdown Content supports the following use cases:

- Rendering a single article
- Rendering a list of articles
- Rendering a single category

Articles can be any type of content and are not limited to "posts". 

### Content

- Markdown content is parsed and rendered into HTML via Commonmark, allowing you to pass in extra plugins
- The package will then render a Blade view of your choosing, passing in the HTML version of the markdown content

## Installation

Install the package via composer:

```
composer require ohseesoftware/laravel-markdown-content
```

Publish the configuration file:

```
php artisan vendor:publish --tag=markdown-content-config
```

The configuration file allows you to define:

- Custom Commonmark extensions for rendering your content
- Route definitions for the supplied route logic

**Note:** the package does not provide a default view to render your content, so you must supply your own view and add it to the configuration file.

### Maintainability score

-   If you want to report on code maintainability, setup the repo at [https://codeclimate.com](https://codeclimate.com)
-   Update the Code Climate image URL in this README file

### Write documentation

-   Remove this TODO section and replace with documentation for your package!

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email security@ohseesoftware.com instead of using the issue tracker.

## Credits

-   [Owen Conti](https://github.com/ohseesoftware)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://https://laravelpackageboilerplate.com/.com).
