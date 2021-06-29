<?php

use App\Http\Controllers\ActorsController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\TvController;
use App\Http\Controllers\UserPlaylistController;
use Illuminate\Support\Facades\Route;


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.show');

Route::get('/tv', [TvController::class, 'index'])->name('tv.index');
Route::get('/tv/{id}', [TvController::class, 'show'])->name('tv.show');

Route::get('/actors', [ActorsController::class, 'index'])->name('actors.index');
Route::get('/actors/page/{page?}', [ActorsController::class, 'index']);
Route::get('/actors/{id}', [ActorsController::class, 'show'])->name('actors.show');


Route::get('/users/{user:username}/playlist', [DashboardController::class, 'index'])->name('users.dashboard');

Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists');
Route::post('/playlists', [PlaylistController::class, 'create']);
Route::delete('/playlists/{playlist}', [PlaylistController::class, 'destroy'])->name('playlists.destroy');



