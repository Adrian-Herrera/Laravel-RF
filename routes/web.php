<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\filepondController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/videos', [VideoController::class, 'dashboard'])->name('videos.dashboard');

Route::resource('videos', VideoController::class);

// Podcast routes

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/podcasts', [PodcastController::class, 'dashboard'])->name('podcasts.dashboard');

Route::resource('podcasts', PodcastController::class);

Route::resource('documents', DocumentController::class);

Route::middleware(['auth:sanctum', 'verified', 'can:users.index'])->resource('users', UserController::class)->only(['index', 'edit', 'update']);


Route::get('/nosotros', [ProfileController::class, 'index'])->name('nosotros.index');

Route::post('filepond', [filepondController::class, 'upload']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
