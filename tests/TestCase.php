<?php
namespace UniSharp\Ratable\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use UniSharp\Ratable\Providers\RatableServiceProvider;
use UniSharp\Ratable\Tests\Faker\Providers\MovieServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'test');
        $app['config']->set('database.connections.test', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [
            RatableServiceProvider::class,
            MovieServiceProvider::class
        ];
    }
}
