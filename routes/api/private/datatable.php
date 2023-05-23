<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'datatables', 'as' => 'api.private.datatable.', 'middleware' => []], function () {
    Route::get('device', function (Request $request) {
        return app('app.action.api.private.datatable.device')->handle($request);
    })->name('device');
    Route::get('client', function (Request $request) {
        return app('app.action.api.private.datatable.client')->handle($request);
    })->name('client');
    Route::get('cron-log', function (Request $request) {
        return app('app.action.api.private.datatable.cron-log')->handle($request);
    })->name('cron-log');
    Route::get('rssh-log', function (Request $request) {
        return app('app.action.api.private.datatable.rssh-log')->handle($request);
    })->name('rssh-log');
    Route::get('ping-server', function (Request $request) {
        return app('app.action.api.private.datatable.ping-server')->handle($request);
    })->name('ping-server');
    Route::get('rssh-connection', function (Request $request) {
        return app('app.action.api.private.datatable.rssh-connection')->handle($request);
    })->name('rssh-connection');
});
