<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Pages
Route::resource('/home', 'HomeController');
Route::resource('/shop', 'ShopController');
Route::resource('/contact', 'ContactController');
Route::resource('/about', 'AboutController');
Route::resource('/cart', 'CartController');

// Admin
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('admin/product', 'ProductController');
Route::resource('admin/user', 'UserController');
Route::resource('admin/stock', 'StockController');
Route::resource('admin/order', 'OrderController');


