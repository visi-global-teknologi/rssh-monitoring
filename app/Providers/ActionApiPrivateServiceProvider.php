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

        $this->app->bind(
            'app.action.api.private.datatable.ping-server',
            \App\Actions\Api\Private\Datatable\PingServer\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.datatable.device',
            \App\Actions\Api\Private\Datatable\Device\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.datatable.rssh-connection',
            \App\Actions\Api\Private\Datatable\RsshConnection\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.datatable.client.device',
            \App\Actions\Api\Private\Datatable\Client\Device\Handler::class
        );

        // rssh connection

        $this->app->bind(
            'app.action.api.private.rssh-connection.request-terminate',
            \App\Actions\Api\Private\RsshConnection\RequestTerminate\Handler::class
        );

        // client

        $this->app->bind(
            'app.action.api.private.client.store',
            \App\Actions\Api\Private\Client\Store\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.client.update',
            \App\Actions\Api\Private\Client\Update\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.client.device.store',
            \App\Actions\Api\Private\Client\Device\Store\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.client.device.update',
            \App\Actions\Api\Private\Client\Device\Update\Handler::class
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
