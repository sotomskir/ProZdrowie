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
    /**
     * Cała logika routes dla pomiarów ma znamiona RESTfull, a w laravel nazwane resource:
     * https://laravel.com/docs/5.4/controllers#resource-controllers
     */
    Route::resource('measurements', 'MeasurementsController');
});

//Route::get('/persons/{username}', 'PersonController@show');
//Route::get('/ranking', 'RankingController@index');