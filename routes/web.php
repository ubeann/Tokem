<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as ProductAdmin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Member\CartController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Guest routes
Route::get('/', [PagesController::class, 'index'])->name('landing');
Route::get('login', [AuthController::class, 'formLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'formRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('products', [PagesController::class, 'products'])->name('products');
Route::get('products/{id}', [PagesController::class, 'productDetail'])->name('detail');
Route::get('add-to-cart/{product_id}', [CartController::class, 'initiate'])->name('add-to-cart');
Route::post('add-to-cart/{product_id}', [CartController::class, 'add']);
Route::get('about-us', [PagesController::class, 'about'])->name('about-us');

// Authenticated routes
Route::group(['middleware' => 'auth'], function() {

    Route::prefix('profile')->name('profile.')->group(function() {
        Route::get('/', [AuthController::class, 'profile'])->name('index');
        Route::get('edit', [AuthController::class, 'editProfile'])->name('edit');
        Route::post('edit', [AuthController::class, 'update']);
    });
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    // Member routes
    Route::middleware('member')->name('member.')->group(function() {
        Route::get('cart', [CartController::class, 'index'])->name('cart');
        Route::get('/checkout', function () {
            return view('member.checkout');
        })->name('checkout');
        Route::get('/transaction', function () {
            return view('member.transaction');
        })->name('transaction');
    });

    // Admin routes
    Route::middleware('admin')->name('admin.')->group(function () {
        Route::get('add-product', [ProductAdmin::class, 'formAdd'])->name('add_product');
        Route::post('add-product', [ProductAdmin::class, 'add']);
        Route::get('edit-product/{id}', [ProductAdmin::class, 'formEdit'])->name('edit_product');
        Route::post('edit-product/{id}', [ProductAdmin::class, 'edit']);
        Route::get('delete-product/{id}', [ProductAdmin::class, 'delete'])->name('delete_product');

        Route::get('category', [CategoryController::class, 'index'])->name('add_category');
        Route::post('category', [CategoryController::class, 'add']);
    });
});
