<?php

namespace BladeEmail\BladeEmail;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeEmailServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'blade-email');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/blade-email'),
            ], 'blade-email-views');
        }

        // Register anonymous components path
        Blade::anonymousComponentPath(__DIR__ . '/../resources/views/components', 'email');
    }

    public function register()
    {
        //
    }
}
