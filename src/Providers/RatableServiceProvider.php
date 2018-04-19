<?php
namespace UniSharp\Ratable\Providers;

use Illuminate\Support\ServiceProvider;
use UniSharp\Ratable\Contracts\RatableModelContract;
use UniSharp\Ratable\Models\Rate;

class RatableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(
            __DIR__.'/../../database/migrations'
        );
        $this->app->bind(RatableModelContract::class, Rate::class);
    }
}
