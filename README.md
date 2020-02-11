# Verify the enrollment status of college and university students

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codelayer/laravel-student-validator.svg?style=flat-square)](https://packagist.org/packages/codelayer/laravel-student-validator) ![phpunit](https://github.com/codelayerhq/laravel-student-validator/workflows/phpunit/badge.svg?branch=master)

This package can be used to validate college and university student's email addresses.

You can install the package using composer:

```bash
composer require codelayer/laravel-student-validator
```

### Translations

If you wish to customize the package's translation, you can publish the translation files:

```bash
php artisan vendor:publish --provider="Codelayer\StudentValidator\StudentValidatorServiceProvider"
```

## Usage

Simply use the `StudentEmail` rule inside your rules array, e.g. in a form request:

```php
use Codelayer\StudentValidator\Rules\StudentEmail;

public function rules()
{
    return [
        'email' => ['required', 'email', new StudentEmail()],
    ];
}
```

## About Us

[codelayer](https://codelayer.de) is a web development agency based in Karlsruhe, Germany. This package was developed for use in our product [likvi](https://likvi.de).

## License

The MIT License (MIT).
