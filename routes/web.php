<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Categorie;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Middleware\watchmiddleware;
use App\Http\Controllers\CategorieController ;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StaffController;
use App\Models\Article;
use Spatie\Permission\Models\Role;
use  App\Models\Order;






Route::prefix('auth')->name('auth.')->group(
    function (){
        Route::get('/login',[AuthController::class,"loginForm"])->name('login');
        Route::get('/register',[AuthController::class,"registerForm"])->name('register');
        Route::post('/login',[AuthController::class,"authenticate"])->name('login');
        Route::post('/register',[AuthController::class,"register"]);
        Route::post('/logout',[AuthController::class,"logout"])->name('logout');

    }
);


Route::post('/order/checkout',[OrderController::class,"checkoutPage"])->name('order.checkout');
Route::get('/order/callback',[OrderController::class,"callback"])->name('order.callback');


Route::get('/',[HomeController::class,"homePage"])->name('home')->middleware('watch');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(
    function (){

    Route::get('/orders',[OrderController::class,"index"])->name('orders.index');

    //test
    Route::patch('/orders/{order}/start-livraison', [OrderController::class, "delivery_start"]);
    Route::patch('/orders/{order}/confirm-livraison', [OrderController::class, "delivery_confirm"]);
    Route::patch('/orders/{order}/reject', [OrderController::class, "reject"]);

    Route::resource('articles', ArticleController::class);
    Route::resource('categories', CategorieController::class);
    Route::resource('staffs',StaffController::class);

    }
);
