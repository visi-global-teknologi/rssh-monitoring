<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ActionApiPrivateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // datatable

        $this->app->bind(
            'app.action.api.private.datatable.client',
            \App\Actions\Api\Private\Datatable\Client\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.datatable.cron-log',
            \App\Actions\Api\Private\Datatable\CronLog\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.datatable.rssh-log',
            \App\Actions\Api\Private\Datatable\RsshLog\Handler::class
        );

        // rssh connection

        $this->app->bind(
            'app.action.api.private.rssh-connection.request-terminate',
            \App\Actions\Api\Private\RsshConnection\RequestTerminate\Handler::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
