<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Api\FacebookController;
use App\Http\Controllers\Api\GoogleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeProductController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\UserLoginController;
use Illuminate\Support\Facades\Route;

#adminLogin

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);
Route::get('admin/logout', [LoginController::class, 'logout']);

#adminChangePassword

Route::get('admin/showChangePasswordForm', [LoginController::class, 'showChangePasswordForm']);
Route::post('admin/changePassword', [LoginController::class, 'changePassword'])->name('changePassword');


Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #menus

        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #product

        Route::prefix('product')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::post('list', [ProductController::class, 'store']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        #slider

        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

        #upload

        Route::post('upload/services', [UploadController::class, 'store']);

        #order

        Route::get('customers', [OrderController::class, 'index']);
        Route::get('customers/view/{customer}', [OrderController::class, 'show']);
        Route::get('ship/{customer}', [OrderController::class, 'active']);
        Route::get('successShip/{customer}', [OrderController::class, 'successShip']);
        Route::get('cancelShip/{customer}', [OrderController::class, 'cancelShip']);


        #acount

        Route::get('acounts', [LoginController::class, 'show']);
    });
});

#Home

Route::get('/', [HomeController::class, 'index'])->name('home');

#register
Route::get('register', [UserLoginController::class, 'register']);
Route::post('register', [UserLoginController::class, 'create']);

#login
Route::get('login', [UserLoginController::class, 'login']);
Route::post('login', [UserLoginController::class, 'create']);


#login google


#login facebook



#changePassword

Route::get('changePassword', [UserLoginController::class, 'showChangePasswordForm']);
Route::post('changePassword', [UserLoginController::class, 'changePassword']);

#loadProduct

Route::post('service/load-product', [HomeController::class, 'loadProduct']);

#loadCategory

Route::get('danh-muc/{id}-{slug}.html', [CategoryController::class, 'index']);

#productDetail

Route::get('san-pham/{id}-{slug}.html', [HomeProductController::class, 'index']);

#addToCart


#orderStatus

Route::get('orderStatus', [OrderStatusController::class, 'show']);
Route::get('orderStatus/destroy/{id}', [OrderStatusController::class, 'destroy']);
