<?php

use App\Http\Controllers\ArticuloController;
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

Route::get('/', [RouteController::class, 'index']);

Route::get('/articulos', [ArticuloController::class, 'index'])->name('articulos.index');

Route::get('/articulos/{articulo}', [ArticuloController::class, 'show'])->name('articulos.show');

Route::post('/articulos', [ArticuloController::class, 'store'])->name('articulos.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/articulos', [ArticuloController::class, 'dashboard'])->name('articulos.dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/articulos/new', [ArticuloController::class, 'new'])->name('articulos.new');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/articulos/{articulo}/edit', [ArticuloController::class, 'edit'])->name('articulos.edit');

Route::middleware(['auth:sanctum', 'verified'])->put('/dashboard/articulos/{articulo}', [ArticuloController::class, 'update'])->name('articulos.update');

Route::middleware(['auth:sanctum', 'verified'])->delete('/dashboard/articulos/{articulo}', [ArticuloController::class, 'delete'])->name('articulos.delete');

Route::get('/videos', [RouteController::class, 'videos'])->name('videos.index');

Route::get('/podcast', [RouteController::class, 'podcast'])->name('podcast.index');

Route::get('/infografias', [RouteController::class, 'infografias'])->name('infografias.index');

Route::get('/nosotros', [RouteController::class, 'nosotros'])->name('nosotros.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
