# Contact form laravel package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/robertgarrigos/contact.svg?style=flat-square)](https://packagist.org/packages/robertgarrigos/contact)
[![Build Status](https://img.shields.io/travis/robertgarrigos/contact/master.svg?style=flat-square)](https://travis-ci.org/robertgarrigos/contact)
[![Quality Score](https://img.shields.io/scrutinizer/g/robertgarrigos/contact.svg?style=flat-square)](https://scrutinizer-ci.com/g/robertgarrigos/contact)
[![Total Downloads](https://img.shields.io/packagist/dt/robertgarrigos/contact.svg?style=flat-square)](https://packagist.org/packages/robertgarrigos/contact)
[![StyleCI](https://github.styleci.io/repos/196822853/shield?branch=master)](https://github.styleci.io/repos/196822853)

This is a laravel package to provide a contact form for your laravel site. The form uses bulma css (https://bulma.io/), a captcha (https://github.com/mewebstudio/captcha), markdown to form the email, is language aware and saves each form submition details in the database.

## Installation

1. [Install the package via composer](#install-the-package-via-composer).
2. [Publish, at least, de migration file](#publish-the-migration-file).
3. [Run the artisan migration command](#run-the-artisan-migration-command).

### Install the package via composer

```bash
composer require robertgarrigos/contact
```
The package will register itself automatically.

### Publish the migration file

You can either publish all the package configurations files or just the migration file.

#### Publish all the configuration files using:
```
php artisan vendor:publish --provider=Robertgarrigos\\Contact\\ContactServiceProvider
```
This will publish:

* a config file in `config/contact.php` where you can set the email form address.
* some view files in `resources/views/vendor/contact` whith which you can control how to show the contact form and the email sent using markdown.
* a lang file `contact.php` in `resources/lang` for English an Catalan.
* a migration file `create_contacts_table` in `database/migrations`.

If you want to publish just some of these files you can run `php artisan vendor:publish` and choose the corresponding tag for config, lang, views or migration. You might need to tun this command with `--force` if you need to overright any existing files.

#### Publish just the migration file using.

```
php artisan vendor:publish --provider=Robertgarrigos\\Contact\\ContactServiceProvider --tag=contact-migration
```

**You must at least publish de migration file before running the artisan migration command**

### Run the artisan migration command.

`php artisan migrate`

## Usage

Point your browser at `yoursite.com/contact`.

Every time a user submits a contact form, you will receive an email to the address set on `config/contact.php`. Of course, you need to set the smtp credentials on your .env file.

Also, every submission will add an entry to the database. There is no backend to access that data for now.

## Tests

Still struggling with the orchestra test bench package. I hope I'll be able to add some tests soon.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email robert@garrigos.cat instead of using the issue tracker.

## TODO
* Add some tests.
* Add a backend to access contact data in the database.

## Credits

- [Robert Garrigos](https://github.com/robertgarrigos)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
