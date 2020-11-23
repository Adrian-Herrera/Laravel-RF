<?php

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

Route::get('/articulos', [RouteController::class, 'articulos']);

Route::get('/videos', [RouteController::class, 'videos']);

Route::get('/podcast', [RouteController::class, 'podcast']);

Route::get('/infografias', [RouteController::class, 'infografias']);

Route::get('/nosotros', [RouteController::class, 'nosotros']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
