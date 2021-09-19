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

// Filter products

Route::get('/sort-new', 'ShopController@newest')->name('sort-new');
Route::get('/sort-price', 'ShopController@priceSort')->name('sort-price');
Route::get('/sort-name', 'ShopController@nameSort')->name('sort-name');
Route::post('/shop/newest', 'ShopController@newestFilter')->name('newest');
Route::post('/shop/price-sort', 'ShopController@priceFilter')->name('price-sort');
Route::post('/shop/name-sort', 'ShopController@nameFilter')->name('name-sort');
Route::resource('/contact', 'ContactController');
Route::resource('/about', 'AboutController');
Route::resource('/cart', 'CartController');
Route::resource('/profiles', 'ProfilesController');

// Admin
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('admin/product', 'ProductController');
Route::resource('admin/user', 'UserController');
Route::resource('admin/stock', 'StockController');
Route::post('admin/stock-show', 'StockController@stockShow')->name('stock-show');
Route::resource('admin/order', 'OrderController');

// Search Engine

Route::get('/search', 'SearchEngineController@searchEngine')->name('search');
Route::get('/search-results', 'SearchEngineController@index')->name('search-results');

// Role Admin
// Route::group(['middleware' => ['auth','role:admin']], function(){
//     // Route::resource('/dashboard', 'DashboardController');
//     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
//     Route::resource('admin/product', 'ProductController');
//     Route::resource('admin/user', 'UserController');
//     Route::resource('admin/stock', 'StockController');
//     Route::post('admin/stock-show', 'StockController@stockShow')->name('stock-show');
//     Route::resource('admin/order', 'OrderController');

//     // Pages
//     Route::resource('/home', 'HomeController');
//     Route::resource('/shop', 'ShopController');

//     // Filter products

//     Route::get('/sort-new', 'ShopController@newest')->name('sort-new');
//     Route::get('/sort-price', 'ShopController@priceSort')->name('sort-price');
//     Route::get('/sort-name', 'ShopController@nameSort')->name('sort-name');
//     Route::post('/shop/newest', 'ShopController@newestFilter')->name('newest');
//     Route::post('/shop/price-sort', 'ShopController@priceFilter')->name('price-sort');
//     Route::post('/shop/name-sort', 'ShopController@nameFilter')->name('name-sort');
//     Route::resource('/contact', 'ContactController');
//     Route::resource('/about', 'AboutController');
//     Route::resource('/cart', 'CartController');
//     Route::resource('/profiles', 'ProfilesController');

//     // Search Engine

//     Route::get('/search', 'SearchEngineController@searchEngine')->name('search');
//     Route::get('/search-results', 'SearchEngineController@index')->name('search-results');

// });


// // Role User (Customer)
// Route::group(['middleware' => ['auth','role:user']], function(){

//     // Pages
//     Route::resource('/home', 'HomeController');
//     Route::resource('/shop', 'ShopController');

//     // Filter products

//     Route::get('/sort-new', 'ShopController@newest')->name('sort-new');
//     Route::get('/sort-price', 'ShopController@priceSort')->name('sort-price');
//     Route::get('/sort-name', 'ShopController@nameSort')->name('sort-name');
//     Route::post('/shop/newest', 'ShopController@newestFilter')->name('newest');
//     Route::post('/shop/price-sort', 'ShopController@priceFilter')->name('price-sort');
//     Route::post('/shop/name-sort', 'ShopController@nameFilter')->name('name-sort');
//     Route::resource('/contact', 'ContactController');
//     Route::resource('/about', 'AboutController');
//     Route::resource('/cart', 'CartController');
//     Route::resource('/profiles', 'ProfilesController');

//     // Search Engine

//     Route::get('/search', 'SearchEngineController@searchEngine')->name('search');
//     Route::get('/search-results', 'SearchEngineController@index')->name('search-results');

// });

