<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\MainDealerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/maindealer', [MainDealerController::class, 'index']);
Route::get('/api', [ApiController::class, 'index']);