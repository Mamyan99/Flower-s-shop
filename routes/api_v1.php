<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Category\CategoryController;
use App\Http\Controllers\Api\V1\Media\MediaController;
use App\Http\Controllers\Api\V1\Option\OptionController;
use App\Http\Controllers\Api\V1\Product\ProductController;
use App\Http\Controllers\Api\V1\Rate\RateController;
use App\Http\Controllers\Api\V1\ShopCart\ShopCartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')
    ->group(function () {
        Route::post('/register', [AuthController::class, 'register'])
            ->name('register');

        Route::post('/login', [AuthController::class, 'login'])
            ->name('login');

        Route::post('/logout', [AuthController::class, 'logout'])
            ->middleware('auth:api')
            ->name('logout');

        Route::post('/refresh-token', [AuthController::class, 'refreshToken']);
    });

Route::prefix('products')
    ->group(function () {
        Route::post('/create', [ProductController::class, 'create'])
            ->middleware(['auth:api', 'admin']);
        Route::get('', [ProductController::class, 'index']);
        Route::put('/update/{id}', [ProductController::class, 'update'])
            ->middleware(['auth:api', 'admin']);
        Route::delete('delete', [ProductController::class, 'delete'])
            ->middleware(['auth:api', 'admin']);
    });

Route::prefix('categories')
    ->group(function () {
        Route::post('/create', [CategoryController::class, 'create'])
            ->middleware(['auth:api', 'admin']);
        Route::get('', [CategoryController::class, 'index']);
        Route::put('/update/{id}', [CategoryController::class, 'update'])
            ->middleware(['auth:api', 'admin']);
        Route::delete('delete', [CategoryController::class, 'delete'])
            ->middleware(['auth:api', 'admin']);
    });

Route::prefix('options')
    ->group(function () {
        Route::post('/create', [OptionController::class, 'create'])
            ->middleware(['auth:api', 'admin']);
        Route::get('', [OptionController::class, 'index']);
        Route::put('/update/{id}', [OptionController::class, 'update'])
            ->middleware(['auth:api', 'admin']);
        Route::delete('delete', [OptionController::class, 'delete'])
            ->middleware(['auth:api', 'admin']);
    });

Route::prefix('media')
    ->group(function () {
        Route::post('/upload', [MediaController::class, 'uploadMedia'])
            ->middleware(['auth:api', 'admin']);
        Route::get('', [MediaController::class, 'index']);
        Route::delete('delete', [MediaController::class, 'delete'])
            ->middleware(['auth:api', 'admin']);
    });

Route::prefix('rates')
    ->group(function () {
        Route::post('/create', [RateController::class, 'create']);
    });

Route::prefix('shop-cart')
    ->group(function () {
        Route::post('/create', [ShopCartController::class, 'create']);
        Route::get('', [ShopCartController::class, 'index']);
        Route::delete('/delete', [ShopCartController::class, 'delete']);
    });
