<?php

use App\Http\Controllers\Admin\ExtraBonuController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqQuestionController;
use App\Http\Controllers\Admin\ManualBonuController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTagController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Auth::routes(['register' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth','admin']], function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::post('users/media', [UserController::class, 'storeMedia'])->name('users.storeMedia');
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Product Category
    Route::post('product-categories/media', [ProductCategoryController::class, 'storeMedia'])->name('product-categories.storeMedia');
    Route::resource('product-categories', ProductCategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Product Tag
    Route::resource('product-tags', ProductTagController::class, ['except' => ['store', 'update', 'destroy']]);

    // Product
    Route::post('products/media', [ProductController::class, 'storeMedia'])->name('products.storeMedia');
    Route::post('products/csv', [ProductController::class, 'csvStore'])->name('products.csv.store');
    Route::put('products/csv', [ProductController::class, 'csvUpdate'])->name('products.csv.update');
    Route::resource('products', ProductController::class, ['except' => ['store', 'update', 'destroy']]);

    // Faq Category
    Route::resource('faq-categories', FaqCategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Faq Question
    Route::resource('faq-questions', FaqQuestionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Manual Bonus
    Route::resource('manual-bonus', ManualBonuController::class, ['except' => ['store', 'update', 'destroy']]);

    // Extra Bonus
    Route::resource('extra-bonus', ExtraBonuController::class, ['except' => ['store', 'update', 'destroy']]);

    // Transactions
    Route::resource('transactions', TransactionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Wallet
    Route::resource('wallets', WalletController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});


Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
});
