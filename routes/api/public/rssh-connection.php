<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'rssh-connections', 'as' => 'api.public.rssh-connection.', 'middleware' => []], function () {
    Route::get('connection-status/{unique_code_device}', function (Request $request, $uniqueCodeDevice) {
        return app('app.action.api.public.rssh-connection.connection-status')->handle($request, $uniqueCodeDevice);
    })->name('connection-status');
    Route::put('/{unique_code_device}', function (Request $request, $uniqueCodeDevice) {
        return app('app.action.api.public.rssh-connection.update')->handle($request, $uniqueCodeDevice);
    })->name('update');
});
