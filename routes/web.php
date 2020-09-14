<?php

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
//  Home 
Route::get('/','HomeController@index')->name('home');
Route::get('about','HomeController@about');

//Admin
Route::get('admin/dashboard', 'AdminController@dashboard')->name('dashboard');

//  Customer
Route::get('register','CustomerController@showRegister')->name('showRegisterCustomer');
Route::post('pembeli/register', 'CustomerController@register')->name('registerCustomer');
Route::get('profile', 'CustomerController@profile');
Route::put('profileUpdate/{id}', 'CustomerController@profileUpdate')->name('profileUpdate');
Route::get('admin/customer', 'CustomerController@showAllCustomer');

//  Login
Route::get('pembeli/login', 'LoginController@showLoginCustomer')->name('showLoginCustomer');
Route::post('pembeli/login', 'LoginController@loginCustomer')->name('checkLoginCustomer');
Route::get('admin/login', 'LoginController@showLoginAdmin')->name('loginAdmin');
Route::post('admin/login', 'LoginController@loginAdmin')->name('CheckLoginAdmin');
Route::get('admin/logout', 'LoginController@logoutAdmin')->name('logoutAdmin');
Route::get('pembeli/logout', 'LoginController@logoutCustomer')->name('logoutCustomer');

//  Capital
Route::get('modal', 'CapitalController@capital')->name('capital');
Route::post('modalPost', 'CapitalController@capitalPost')->name('capitalPost');

//  Cart
Route::get('/cart', 'CartController@index');
Route::post('/tambahKeranjang', 'CartController@store')->name('cartPost');
Route::post('/addCart', 'CartController@addCart')->name('addCart');
Route::delete('item/{id}', 'CartController@destroy')->name('deleteItem');

//  Checkout
Route::post('/checkout', 'CheckoutController@index')->name('checkoutPost');
Route::get('/checkout', 'CheckoutController@showCheckout')->name('showCheckout');
Route::get('/riwayatCheckout', 'CheckoutController@showHistoryCheckout')->name('riwayatCheckout');

//  Payment
Route::put('/payment/{id}', 'PaymentController@paymentPost');
Route::put('/confirmationUpdate/{id}', 'PaymentController@ConfirmationUpdate');
Route::get('admin/confirmation', 'PaymentController@confirmation')->name('confirmation');
Route::get('pembayaran/save/{id}', 'PaymentController@download')->name('download');
Route::get('penjualan', 'PaymentController@sell');

//  RajaOngkir
Route::get('/api/provinsi', 'RajaOngkirController@apiRajaOngkir');
Route::get('/destination={destination}&weight={weight}&courier={courier}', 'RajaOngkirController@getCost');

//  Product
Route::resource('product', 'ProductController');
Route::get('admin/product', 'ProductController@index')->name('listProduct');
Route::post('/admin/product/addProduct', 'ProductController@store')->name('addProduct');
Route::get('/showProductById/{id}', 'ProductController@showProductById')->name('productByCategory');
Route::get('/searchProduct', 'ProductController@search');
//Category
Route::resource('category', 'CategoryController');