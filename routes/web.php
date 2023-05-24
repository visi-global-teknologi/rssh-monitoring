<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('devices', \App\Http\Controllers\DeviceController::class)->middleware(['auth']);
Route::resource('clients', \App\Http\Controllers\ClientController::class)->middleware(['auth']);
Route::resource('cron-logs', \App\Http\Controllers\CronLogController::class)->middleware(['auth']);
Route::resource('rssh-logs', \App\Http\Controllers\RsshLogController::class)->middleware(['auth']);
Route::resource('ping-servers', \App\Http\Controllers\PingServerController::class)->middleware(['auth']);
Route::resource('rssh-connections', \App\Http\Controllers\RsshConnectionController::class)->middleware(['auth']);
Route::group(['prefix' => 'clients/{id}', 'as' => 'client.', 'middleware' => ['auth']], function () {
    Route::resource('devices', \App\Http\Controllers\Client\DeviceController::class);
});
