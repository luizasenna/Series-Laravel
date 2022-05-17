<?php

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

Route::get('/', [SeriesController::class, 'index']);

Route::resource('/series', SeriesController::class);
/*Route::controller(SeriesController::class)->group(function(){
    Route::group(['prefix' => '/series'], function(){
        Route::get('',  'index')->name('series.index');
        Route::get('/create',  'create')->name('series.create');
        Route::post('/store',  'store')->name('series.store');
        Route::post('/destroy/{serie}', 'destroy')->name('series.destroy');
    });
});*/

