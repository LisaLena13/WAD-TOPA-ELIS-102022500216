<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\BarangController;

Route::resource('barangs', BarangController::class);
use App\Http\Controllers\RakController;

Route::resource('raks', RakController::class);