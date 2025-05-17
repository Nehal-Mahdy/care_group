<?php

use App\Http\Controllers\Front\HomePageController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\ProductCategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\Admin\OrdersController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\front\CartController;

use App\Http\Controllers\front\CheckoutController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return redirect('/');
});

Route::get('/dashboard', function () {
    return redirect()->route('dashboard');
});


Route::middleware(['auth', 'verified'])->prefix('/admin')->group(function () {

    // Default route redirects to login page


    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin resource routes
    Route::resource('permissions', PermissionsController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('users', UsersController::class);
    // General
    Route::resource('productCategories', ProductCategoriesController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('orders', OrdersController::class);



    Route::get('/activity-log', [ActivityLogController::class, 'index'])->name('activity-log.index');
});

// Front routes
Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'search'])->name('search');


// products routes
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');


// Cart routes
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/update-ajax', [CartController::class, 'updateAjax'])->name('cart.update.ajax');

// Checkout routes
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
Route::get('/checkout/thankyou/{order}', [CheckoutController::class, 'thankYou'])->name('checkout.thankyou');


require __DIR__ . '/auth.php';







