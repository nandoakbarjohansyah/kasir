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

// Route::get('/', function () {
//     return view('kasirlayout.app');
// });
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

// menu
Route::get('menu', 'MenuController@index')->name('menu');
Route::post('/add-menu', 'Menucontroller@create')->name('add-menu');
Route::post('/add-tipe', 'MenuController@store')->name('add-tipe');
Route::get('/edit-menu/{id}', 'MenuController@edit')->name('edit-menu');
Route::post('/update-menu/{id}', 'MenuController@update')->name('update-menu');
Route::get('/edit-category/{id}', 'MenuController@edit_cat')->name('edit-category');
Route::post('/update-category/{id}', 'MenuController@update_cat')->name('update-category');
Route::get('/delete-menu/{id}', 'MenuController@destroy')->name('delete-menu');
Route::get('/delete-category/{id}', 'MenuController@des_cat')->name('delete-category');

// table
Route::get('/table', 'TableController@index')->name('table');
Route::post('/add-table', 'TableController@create')->name('add-table');
Route::get('/edit-table/{id}', 'TableController@edit')->name('edit-table');
Route::post('/update-table/{id}', 'TableController@update')->name('update-table');
Route::get('/delete-table/{id}', 'TableController@destroy')->name('delete-table');

// pesanan
Route::get('/order', 'PesananController@index')->name('order');
Route::get('/add-order', 'PesananController@create')->name('add-order');
Route::post('/store-order', 'PesananController@store')->name('store-order');
Route::get('/show-order/{id}', 'PesananController@show')->name('show-order');
Route::get('/delete-order/{id}', 'PesananController@destroy')->name('delete-order');

// export
Route::get('/export', 'HomeController@export_excel')->name('export');



