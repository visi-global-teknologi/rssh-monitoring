<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'clients', 'as' => 'api.private.client.', 'middleware' => []], function () {
    Route::post('/', function (Request $request) {
        return app('app.action.api.private.client.store')->handle($request);
    })->name('store');
    Route::put('/{id}', function (Request $request, $id) {
        return app('app.action.api.private.client.update')->handle($request, $id);
    })->name('update');
    Route::group(['prefix' => '/{id}/devices', 'as' => 'device.', 'middleware' => []], function () {
        Route::post('/', function (Request $request, $id) {
            return app('app.action.api.private.client.device.store')->handle($request, $id);
        })->name('store');
        Route::put('/{device}', function (Request $request, $id, $device) {
            return app('app.action.api.private.client.device.update')->handle($request, $id, $device);
        })->name('update');
    });
});
