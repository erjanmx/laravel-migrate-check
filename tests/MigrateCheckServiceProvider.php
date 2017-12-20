<?php

namespace Erjanmx\MigrateCheck\Test;

use Illuminate\Support\ServiceProvider;
use Erjanmx\MigrateCheck\Commands\MigrateCheckCommand;

class MigrateCheckServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bind('command.migrate:check', MigrateCheckCommand::class);

        $this->commands([
            'command.migrate:check',
        ]);
    }
}
