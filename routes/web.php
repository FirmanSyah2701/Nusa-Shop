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

Route::get('/','HomeController@index');
Route::get('tentang','HomeController@tentang');
Route::get('daftar','HomeController@daftar');
Route::post('pembeli/register', 'CustomerController@store')->name('registerPembeli');
Route::get('pembeli/login', 'LoginController@showLoginPembeli')->name('loginPembeli');
Route::post('pembeli/checklogin', 'LoginController@loginCustomer')->name('CheckLoginPembeli');
Route::get('admin/login', 'LoginController@showLogin')->name('loginAdmin');
Route::post('admin/Checklogin', 'LoginController@login')->name('CheckLoginAdmin');
Route::get('admin/logout', 'LoginController@logout')->name('logout');
Route::get('pembeli/logout', 'LoginController@logoutPembeli')->name('logoutPembeli');
Route::get('admin/dashboard', 'DashboardController@dashboard')->name('dashboard');
//Route::get('admin/product', 'ProductController@index')->name('listProduct');
//Route::post('/admin/product/addProduct', 'ProductController@store')->name('addProduct');
Route::resource('product', 'ProductController');
Route::get('admin/product', 'ProductController@index')->name('listProduct');
Route::post('/admin/product/addProduct', 'ProductController@store')->name('addProduct');
Route::get('admin/customer', 'CustomerController@index');
