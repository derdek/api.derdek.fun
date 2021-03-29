<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZIPModelController;

Route::post('/upload', ZIPModelController, 'upload');

Route::get('/zip', ZIPModelController, 'getInfoByZIP');

Route::get('/city', ZIPModelController, 'getInfoByCity');
