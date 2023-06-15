<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'Web\HomeController@Index')->name('auth.login');

    Route::group(['prefix' => '/auth'], function () {
        Route::post('/login', 'Web\AuthController@LoginProcess')->name('auth.login_process');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::group(['prefix' => 'auth'], function () {
            Route::get('logout', 'Web\DashboardController@LogoutProcess')->name('auth.logout_process');
        });

        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('', 'Web\DashboardController@Index')->name('dashboard.index');
        });

        Route::group(['prefix' => 'feature'], function () {
            Route::get('', 'Web\FeatureController@Index')->name('feature.index');
            Route::post('upsert', 'Web\FeatureController@UpsertProcess')->name('feature.upsert_process');
        });

        Route::group(['prefix' => 'main_dealer'], function () {
            Route::get('', 'Web\MainDealerController@Index')->name('main_dealer.index');
            Route::post('upsert', 'Web\MainDealerController@UpsertProcess')->name('main_dealer.upsert_process');

            Route::group(['prefix' => '{main_dealer_id?}/application'], function () {
                Route::get('', 'Web\BackEndController@Index')->name('main_dealer.application.index');
                Route::post('upsert', 'Web\BackEndController@UpsertProcess')->name('main_dealer.application.upsert_process');
            });

            Route::group(['prefix' => '{main_dealer_id?}/api'], function () {
                Route::get('', 'Web\ApiController@Index')->name('main_dealer.api.index');
                Route::get('upsert', 'Web\ApiController@Upsert')->name('main_dealer.api.upsert');
                Route::post('upsert', 'Web\ApiController@Upsert')->name('main_dealer.api.upsert_process');
            });
        });

        
    });
});
