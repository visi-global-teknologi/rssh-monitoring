<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ActionApiPublicServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // ping

        $this->app->bind(
            'app.action.api.public.ping.store',
            \App\Actions\Api\Public\Ping\Store\Handler::class
        );

        // rssh log

        $this->app->bind(
            'app.action.api.public.rssh-log.store',
            \App\Actions\Api\Public\RsshLog\Store\Handler::class
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
