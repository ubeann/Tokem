<?php

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

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/products/detail', function () {
    return view('detail');
})->name('detail');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// MEMBER
Route::get('/cart', function () {
    return view('member.cart');
})->name('cart');
Route::get('/transaction', function () {
    return view('member.transaction');
})->name('transaction');

// ADMIN
Route::get('/add_product', function () {
    return view('admin.add_product');
})->name('add_product');

Route::get('/add_category', function () {
    return view('admin.add_category');
})->name('add_category');
