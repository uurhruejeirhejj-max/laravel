<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

// Halaman beranda
Route::get('/', function () {
    return view('welcome');
});

// Resource routes untuk Project (7 route otomatis)
Route::resource('projects', ProjectController::class);