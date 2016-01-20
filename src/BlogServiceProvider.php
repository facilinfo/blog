<?php

namespace Facilinfo\Blog;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        // Migrations
        $this->publishes([
            __DIR__ . '/Database/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');

        // Routes
        include __DIR__.'/App/Http/routes.php';

        // Views
        $this->loadViewsFrom(__DIR__ . '/Resources/Views', 'gallery');
        $this->publishes([
            __DIR__ . '/Resources/Views' => $this->app->basePath() . '/resources/views'
        ], 'views');

        // Js
        $this->publishes([
            __DIR__ . '/Assets/Js' => $this->app->publicPath() . '/js'
        ], 'js');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['blog'] = $this->app->share(function($app) {
            return new Blog;
        });

        // Config
       // $this->mergeConfigFrom( __DIR__.'/Config/blog.php', 'gallery');

        //Load dependencies
        $this->app->register(\AdamWathan\BootForms\BootFormsServiceProvider::class);
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('BootForm', '\AdamWathan\BootForms\Facades\BootForm');

        $this->app->register(\Bican\Roles\RolesServiceProvider::class);

        $this->app->register(\Unisharp\Ckeditor\ServiceProvider::class);

        $this->app->register(\Unisharp\Ckeditor\ServiceProvider::class);

        $this->app->register(\Bestmomo\Filemanager\FilemanagerServiceProvider::class);

    }
}
