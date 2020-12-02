<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Route

Route::get('/', [RouteController::class, 'index'])->name('home');

// Article routes

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/articulos', [ArticuloController::class, 'dashboard'])->name('articulos.dashboard');

Route::resource('articulos', ArticuloController::class);

// Image routes

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/infografias', [ImageController::class, 'dashboard'])->name('images.dashboard');

Route::resource('infografias', ImageController::class)->parameters(['infografias' => 'image'])->names('images');

// Video routes

Route::get('/videos', [RouteController::class, 'videos'])->name('videos.index');

Route::get('/podcast', [RouteController::class, 'podcast'])->name('podcast.index');


Route::get('/nosotros', [RouteController::class, 'nosotros'])->name('nosotros.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
