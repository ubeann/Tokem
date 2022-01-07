<?php

use App\Http\Controllers\AuthController;
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
Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/products/detail', function () {
    return view('detail');
})->name('detail');

Route::get('/abous-us', function () {
    return view('about-us');
})->name('about-us');


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
        Route::get('/cart', function () {
            return view('member.cart');
        })->name('cart');
        Route::get('/checkout', function () {
            return view('member.checkout');
        })->name('checkout');
        Route::get('/transaction', function () {
            return view('member.transaction');
        })->name('transaction');
    });

    // Admin routes
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/add_product', function () {
            return view('admin.add_product');
        })->name('add_product');

        Route::get('/add_category', function () {
            return view('admin.add_category');
        })->name('add_category');
    });
});
