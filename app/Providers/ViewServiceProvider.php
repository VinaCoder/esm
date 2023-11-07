<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use ReflectionException;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @throws ReflectionException
     */
    public function boot(): void
    {
        $this->registerComponents();
    }

    private function registerComponents(): void
    {
        Blade::anonymousComponentPath(resource_path('views/icons'), 'icons');
    }
}
