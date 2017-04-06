<?php

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
    return view('welcome');
});

Route::get('/persons/{username}', 'PersonController@show');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/ranking', 'RankingController@index');

Route::group(['prefix' => 'measurements'], function () {
    Route::get('', 'MeasurementsController@index')->name('measurement.index');
    Route::post('', 'MeasurementsController@save');
    Route::get('create', 'MeasurementsController@create');
    Route::get('{measurement}', 'MeasurementsController@edit');
    Route::put('{measurement}', 'MeasurementsController@update');
    Route::delete('{measurement}', 'MeasurementsController@delete');
});