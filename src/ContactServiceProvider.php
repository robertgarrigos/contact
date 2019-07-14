<?php

namespace Robertgarrigos\Contact;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'contact');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'contact');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        if (! class_exists('CreateContactsTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_contacts_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_contacts_table.php'),
            ], 'contact-migrations');
        }

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/contact.php' => config_path('contact.php'),
            ], 'contact-config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/contact'),
            ], 'contact-views');

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/contact'),
            ], 'assets');*/

            //Publishing the translation files.
            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang'),
            ], 'contact-lang');

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // $this->app->make('Robertgarrigos\Contact\Http\Controllers\ContactController');
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/contact.php', 'contact');

        // Register the main class to use with the facade
        // $this->app->singleton('contact', function () {
        //     return new Contact;
        // });
    }
}
