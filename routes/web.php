<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect('/series');
})->middleware(\App\Http\Middleware\Autenticador::class);

Route::resource('/series', SeriesController::class)->except(['show']);
//    ->only(['index', 'create', 'store', 'destroy', 'edit']);

Route::get('/series/{series}/seasons', [SeasonController::class, 'index'])->name('seasons.index');

Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('update');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
Route::get('/register', [UserController::class, 'create'])->name('users.create');
Route::post('/register', [UserController::class, 'store'])->name('users.create');

//Route::delete('/series/destroy/{serieId}', [SeriesController::class, 'destroy'])->name('series.destroy');
//Route::controller(SeriesController::class)->group(function (){
//    Route::get('/series', 'listarSeries')->name('series.index');
//    Route::get('/series/create', 'create')->name('series.create');
//    Route::post('/series/salvar', 'store')->name('series.salvar');
//});

