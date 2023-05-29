<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'Web\HomeController@Index')->name('auth.login');

    Route::group(['prefix' => '/auth'], function () {
        Route::post('/login', 'Web\AuthController@LoginProcess')->name('auth.login_process');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::group(['prefix' => '/auth'], function () {
            Route::get('/logout', 'Web\DashboardController@LogoutProcess')->name('auth.logout_process');
        });

        Route::group(['prefix' => '/dashboard'], function () {
            Route::get('/', 'Web\DashboardController@Index')->name('dashboard.index');
        });

        Route::group(['prefix' => '/maindealer'], function () {
            Route::get('/', 'Web\MainDealerController@Index')->name('maindealer.index');
            Route::post('/upsert', 'Web\MainDealerController@UpsertProcess')->name('maindealer.upsert_process');
        });

        Route::group(['prefix' => 'feature'], function () {
            Route::get('/', 'Web\FeatureController@Index')->name('feature.index');
            Route::post('/upsert', 'Web\FeatureController@UpsertProcess')->name('feature.upsert_process');
        });
    });
});
