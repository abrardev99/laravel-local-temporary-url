<?php

namespace Abrardev\LocalTemporaryUrl;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LocalTemporaryUrlServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-local-temporary-url')
            ->hasConfigFile()
            ->hasRoute('routes');
    }

    public function boot()
    {
        parent::boot();

        foreach (config('local-temporary-url.disk') as $disk) {
            Storage::disk($disk)->buildTemporaryUrlsUsing(function ($path, $expiration, $options) use ($disk) {
                return URL::temporarySignedRoute(
                    "$disk.temp",
                    $expiration,
                    array_merge($options, ['path' => $path])
                );
            });
        }
    }
}
