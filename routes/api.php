<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('public')->group(__DIR__.'/api/public/ping.php');
