> [!CAUTION]
> This package has abounded in favor of Laravel 11 official support for temporary urls https://laravel.com/docs/11.x/filesystem#temporary-urls. However, you can still use this package in Laravel 10 and below. 

![Logo](https://banners.beyondco.de/Laravel%20Local%20Disk%20Temporary%20URL%20.png?theme=light&packageManager=composer+require&packageName=abrardev%2Flaravel-local-temporary-url&pattern=floorTile&style=style_1&description=Quickly+add+support+for+temporary+url+for+local+filesystem+drivers&md=1&showWatermark=0&fontSize=100px&images=link)

## Installation

You can install the package via composer:

```bash
composer require abrardev/laravel-local-temporary-url
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="local-temporary-url-config"
```

This is the contents of the published config file:

```php
return [
    'disk' => ['local'],

    'middleware' => ['web', 'signed']
];
```

## Usage

### Configuration
This package needs zero configuration, just install and it's good to go. However, if your local disk is different or you want to add another disk, you can configure it. You can add multiple local disks in the config using the `disk` key. <br>

The package applies `web` and `signed` middleware on routes by default, however, you can configure middleware(s) using the `middleware` key.

### Generate Temporary URL
You can use the same syntax used for S3 disk. 
```php
Storage::disk('local')->temporaryUrl('file.txt', now()->addMinutes(5));
```

### Pass Parameters 
You can pass parameters to the temporaryUrl function for ef filename.  
```php
Storage::disk('local')->temporaryUrl('file.txt', now()->addMinutes(5), ['filename' => 'customname']);
```

Not just file name, you can pass other options as well (with respect to disk) 
```php
[
  'ResponseContentType' => 'application/octet-stream',
  'ResponseContentDisposition' => 'attachment; filename=file2.jpg',
]
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

- [Abrar Ahmad](https://github.com/abrardev99)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
