<?php

use Illuminate\Support\Facades\Route;

Route::prefix('public')->group(__DIR__.'/api/public/ping.php');
Route::prefix('public')->group(__DIR__.'/api/public/rssh-log.php');
