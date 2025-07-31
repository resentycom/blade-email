<?php

namespace Tests;

use BladeEmail\BladeEmail\BladeEmailServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            BladeEmailServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Set up any environment configuration for testing
        $app['config']->set('view.paths', [
            __DIR__.'/../resources/views',
        ]);
    }
}
