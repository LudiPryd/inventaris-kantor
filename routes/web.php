<?php

use App\Http\Controllers\GoodsController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

Route::resource('/', TrackController::class);

Route::resource('/goods', GoodsController::class);
Route::resource('/tracks', TrackController::class);