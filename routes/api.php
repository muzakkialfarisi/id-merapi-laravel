<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::post('/register', 'Api\AuthController@register_process');
    Route::post('/login', 'Api\AuthController@login_process');

    Route::get('/maindealer', 'Api\MainDealerController@index');
    Route::get('/api', 'Api\ApiController@index');
});
