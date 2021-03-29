<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZIPModelController;

Route::post('/upload', [ZIPModelController::class, 'upload']);

Route::get('/zip/{zip}', [ZIPModelController::class, 'getInfoByZIP']);

Route::get('/city/{city}', [ZIPModelController::class, 'getInfoByCity']);
