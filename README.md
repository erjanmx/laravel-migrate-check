### An artisan command to check for pending migrations. Exits with non-zero code if there any. 

[![Build Status](https://app.travis-ci.com/erjanmx/laravel-migrate-check.svg?branch=master)](https://app.travis-ci.com/erjanmx/laravel-migrate-check)

Laravel has a `migrate:status` command to check status of migrations. But this command mostly for humans. There are situations where one needs to know whether to run migrations when using autodeployment, maybe with switching to maintenance mode.

This package contains a `migrate:check` command that exits with non-zero code if there are any migrations to run.

## Requirements

This command supports all database drivers that Laravel does.

## Installation

You can install the package via composer:

```bash
composer require erjanmx/laravel-migrate-check
```

Thanks to Laravel 5.5 package auto-discovery the `migrate:check` command will be registered

## Usage

```bash
php artisan migrate:сheck
```

You can specify database and path to migration file via options just like they are used in `php artisan migrate` command

![ezgif com-gif-maker](https://user-images.githubusercontent.com/4899432/34324977-691c5ca2-e895-11e7-9564-f4313763bc74.gif)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

In order for the test to be run you should set up an empty mysql database `laravel_migrate_check` . The username should be `root`, the required password should be empty.

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
