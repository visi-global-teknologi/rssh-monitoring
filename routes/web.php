<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('clients', \App\Http\Controllers\ClientController::class);
Route::resource('cron-logs', \App\Http\Controllers\CronLogController::class);
Route::resource('rssh-logs', \App\Http\Controllers\RsshLogController::class);
