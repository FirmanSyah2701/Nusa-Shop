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
Route::get('detailproduk','HomeController@detailproduk');
Route::get('daftar','HomeController@daftar');

Route::get('pembeli/login', 'LoginController@showLoginPembeli')->name('login');
Route::get('admin/login', 'LoginController@showLogin')->name('login');
Route::post('admin/Checklogin', 'LoginController@login')->name('loginAdmin');
Route::get('admin/logout', 'LoginController@logout')->name('logout');
Route::get('admin/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('admin/product', 'ProductController@index')->name('listProduct');
Route::post('/admin/product/addProduct', 'ProductController@store')->name('addProduct');
