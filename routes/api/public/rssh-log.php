<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'rssh-logs', 'as' => 'api.private.rssh-log.', 'middleware' => []], function () {
    Route::post('/', function (Request $request) {
        return app('app.action.api.public.rssh-log.store')->handle($request);
    })->name('store');
});
