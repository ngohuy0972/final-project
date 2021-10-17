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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Guest
Route::resource('home', 'HomeController');
Route::resource('shop', 'ShopController');
Route::get('/sort-new', 'ShopController@newest')->name('sort-new');
Route::get('/sort-price', 'ShopController@priceSort')->name('sort-price');
Route::get('/sort-name', 'ShopController@nameSort')->name('sort-name');
Route::post('/shop/newest', 'ShopController@newestFilter')->name('newest');
Route::post('/shop/price-sort', 'ShopController@priceFilter')->name('price-sort');
Route::post('/shop/name-sort', 'ShopController@nameFilter')->name('name-sort');
Route::resource('contact', 'ContactController');
Route::resource('about', 'AboutController');
Route::post('subscribe-email', 'EmailController@subscribeMail')->name('subscribe');
Route::post('contact-us-email', 'EmailController@contactMail')->name('contact-us-email');


// Search Engine

Route::get('/search', 'SearchEngineController@searchEngine')->name('search');
Route::get('/search-results', 'SearchEngineController@index')->name('search-results');


// Role Admin
Route::group(['middleware' => ['auth','role:admin']], function(){

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('admin/product', 'ProductController');
    Route::resource('admin/user', 'UserController');
    Route::resource('admin/stock', 'StockController');
    Route::post('admin/stock-show', 'StockController@stockShow')->name('stock-show');
    Route::resource('admin/order', 'OrderController');
    Route::resource('profiles', 'ProfilesController');
    Route::resource('orders', 'OrderController');
    Route::resource('order-history', 'OrderHistoryController');


});


// Role User (Customer)
Route::group(['middleware' => ['auth','role:user']], function(){

    Route::resource('profiles', 'ProfilesController');
    Route::resource('order-history', 'OrderHistoryController');
    // Cart
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::get('add/{id}', 'CartController@addCart')->name('cart-add');
    Route::get('remove/{id}', 'CartController@removeCart')->name('cart-remove');
    Route::get('update/{id}', 'CartController@updateCart')->name('cart-update');
    Route::get('clear', 'CartController@clearCart')->name('cart-clear');
    Route::resource('/checkout', 'CheckoutController');
    Route::get('payment-success', 'PaymentController@paymentSuccess')->name('payment-success');
    Route::get('payment-method', 'PaymentController@paymentMethod')->name('payment-method');
    Route::get('email', 'CheckoutController@email');

});

