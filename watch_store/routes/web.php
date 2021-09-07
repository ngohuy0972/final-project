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
    return view('welcome');
});

// Authentication

Route::resource('/login', 'LoginController');
Route::resource('/register', 'RegisterController');
Route::resource('/reset-password', 'ResetPasswordController');

// Pages
Route::resource('/home', 'HomeController');
Route::resource('/shop', 'ShopController');
Route::resource('/contact', 'ContactController');
Route::resource('/about', 'AboutController');
Route::resource('/cart', 'CartController');

// Product


