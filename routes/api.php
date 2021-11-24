<?php

use App\Http\Controllers\Api\V1\Admin\ManualBonuApiController;
use App\Http\Controllers\Api\V1\Admin\ProductApiController;
use App\Http\Controllers\Api\V1\Admin\TransactionApiController;
use App\Http\Controllers\Api\V1\Admin\UserApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::post('users/media', [UserApiController::class, 'storeMedia'])->name('users.store_media');
    Route::apiResource('users', UserApiController::class);

    // Product
    Route::post('products/media', [ProductApiController::class, 'storeMedia'])->name('products.store_media');
    Route::apiResource('products', ProductApiController::class);

    // Manual Bonus
    Route::apiResource('manual-bonus', ManualBonuApiController::class);

    // Transactions
    Route::apiResource('transactions', TransactionApiController::class);
});
