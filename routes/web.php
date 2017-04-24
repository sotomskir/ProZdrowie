<?php

Auth::routes();
\Debugbar::enable();

/**
 * Tworzę grupę routingu -wszystkie ustawienia zdefiniowane w grupie
 * mają zastosowanie do innych routes wewnątrz, żeby się nie dublować:
 * https://laravel.com/docs/5.4/routing#route-groups
 * dodatkowo określam, że HomeController ma być dostępny jedynie dla
 * zalogowanych użytkowników, wykorzystująć wbudowany middleware auth:
 * https://laravel.com/docs/5.4/authentication#protecting-routes
 */
Route::group(['middleware' => 'auth'], function () {
    /**
     * zmienniam /home na /, żeby domyślne wejście na stronę kierowało
     * od razu do formularza logowania albo dashboardu usera
     */
    Route::get('/', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);
    Route::get('/ranking', [
        'uses' => 'RankingController@index',
        'as' => 'ranking'
    ]);
});

//Route::get('/persons/{username}', 'PersonController@show');
//Route::get('/ranking', 'RankingController@index');

Route::group(['prefix' => 'measurements'], function () {
    Route::get('', 'MeasurementsController@index')->name('measurement.index');
    Route::post('', 'MeasurementsController@save');
    Route::get('create', 'MeasurementsController@create');
    Route::get('{measurement}', 'MeasurementsController@edit');
    Route::put('{measurement}', 'MeasurementsController@update');
    Route::delete('{measurement}', 'MeasurementsController@delete');
});