<?php

namespace Abrardev\LocalTemporaryUrl\Tests;

use Abrardev\LocalTemporaryUrl\LocalTemporaryUrlServiceProvider;
use Illuminate\Support\Facades\Storage;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {

        return [
            LocalTemporaryUrlServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        Storage::fake('local2');

        config()->set('local-temporary-url.disk', ['local', 'local2']);
    }
}
