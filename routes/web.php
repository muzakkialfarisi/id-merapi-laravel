<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    Route::get('/', 'Web\HomeController@index')->name('auth.login');

    Route::group(['prefix' => '/auth'], function () {
        Route::post('/login', 'Web\AuthController@login_process')->name('auth.login_process');
    });
    Route::group(['prefix' => '/dashboard'], function () {
        Route::get('/', 'Web\DashboardController@index');
    });
    Route::group(['middleware' => ['auth']], function() {
        // Route::group(['prefix' => '/dashboard'], function () {
        //     Route::get('/', 'Web\DashboardController@index')->name('dashboard.index');
        // });

    });
});
