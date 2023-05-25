<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\HomeController;

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    Route::get('/', 'Web\HomeController@index')->name('auth.login');

    Route::group(['prefix' => '/auth'], function () {
        Route::post('/login', 'Web\AuthController@login_process')->name('auth.login_process');
    });
    Route::group(['prefix' => '/dashboard'], function () {
        Route::get('/', 'Web\DashboardController@index')->name('dashboard.index');
    });
    Route::group(['middleware' => ['auth']], function() {
        // Route::group(['prefix' => '/dashboard'], function () {
        //     Route::get('/', 'Web\DashboardController@index')->name('dashboard.index');
        // });

    });
});
// Route::group(['prefix' => '/'], function () {
//     Route::get('/', [HomeController::class, 'index'])->name('home.index');


//     Route::post('/login_process', [AuthController::class, 'login_process'])->name('auth.login_process');
// });

// Route::group(['prefix' => '/'], function () {
//     Route::group(['prefix' => 'dashboard'], function () {
//         Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
//     });
// });
