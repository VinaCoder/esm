<?php

namespace App\Providers;

use App\Mixins\StrMixin;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use ReflectionException;

class UtilityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @throws ReflectionException
     */
    public function boot(): void
    {
        Str::mixin(new StrMixin());
    }
}
