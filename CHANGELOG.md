# Changelog

All notable changes to `laravel-local-temporary-url` will be documented in this file.

## First release  - 2023-11-03

### Usage

This package needs zero configuration, just install and it's good to go. However, if your local disk is different or you want to add another disk, you can configure it. You can add multiple local disks in the config using the `disk` key. <br>

The package applies `web` and `signed` middleware on routes by default, however, you can configure middleware(s) using the `middleware` key.

#### Generate Temporary URL

You can use the same syntax used for S3 disk.

```php
Storage::disk('local')->temporaryUrl('file.txt', now()->addMinutes(5));

```