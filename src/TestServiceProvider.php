<?php
/**
 * Created by PhpStorm.
 * User: white
 * Date: 7/10/18
 * Time: 5:58 PM
 */

namespace OlderW\Test;


use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $commands = [
        'OlderW\Test\Console\MakeCommand',
        'OlderW\Test\Console\MenuCommand',
        'OlderW\Test\Console\InstallCommand',
        'OlderW\Test\Console\UninstallCommand',
        'OlderW\Test\Console\ImportCommand',
    ];

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/../config' => config_path()], 'olderw-test-config');
            $this->publishes([__DIR__.'/../resources/lang' => resource_path('lang')], 'olderw-test-lang');
//            $this->publishes([__DIR__.'/../resources/views' => resource_path('views/admin')],           'olderw-test-views');
            $this->publishes([__DIR__.'/../database/migrations' => database_path('migrations')], 'olderw-test-migrations');
            $this->publishes([__DIR__.'/../resources/assets' => public_path('vendor/laravel-test')], 'olderw-test-assets');
        }
    }
}