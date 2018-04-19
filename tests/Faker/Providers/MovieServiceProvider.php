<?php
namespace UniSharp\Ratable\Tests\Faker\Providers;

use Illuminate\Support\ServiceProvider;

class MovieServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(
            __DIR__.'/../Migrations'
        );
    }
}
