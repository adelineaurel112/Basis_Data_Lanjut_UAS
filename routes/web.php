<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KategoriController;

Route::resource('posts', PostController::class);
Route::resource('kategori', KategoriController::class);
Route::get('/', function () {
    return view('welcome');
});
