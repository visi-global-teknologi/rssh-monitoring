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
});
