<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeasonController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

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

Route::get('/', [SeriesController::class, 'index'])->middleware(Autenticador::class);


/*Route::controller(SeriesController::class)->group(function(){
    Route::group(['prefix' => '/series'], function(){
        Route::get('',  'index')->name('series.index');
        Route::get('/create',  'create')->name('series.create');
        Route::post('/store',  'store')->name('series.store');
        Route::post('/destroy/{serie}', 'destroy')->name('series.destroy');
    });
});*/

Auth::routes();
Route::resource('/series', SeriesController::class);
Route::middleware('autenticador')->group(function(){
    Route::get('/series/{series}/seasons', [SeasonController::class, 'index'])->name('seasons.index');
    Route::get('seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
    Route::post('seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');
});
