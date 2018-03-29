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
//
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@show')->name('profile')->middleware('auth');
// Route::get('/nav', 'DishesController@index')->name('nav');
Route::get('/dishes', 'AdminDishesController@index')->name('dishes-admin');
Route::get('/dishes-create', 'AdminDishesController@create')->name('dishes-create')->middleware('IsAdmin');
Route::post('/store', 'AdminDishesController@store')->name('store');
Route::get('/', 'MainPage\IndexController@index')->name('index');
Route::get('/dishes-edit/{id}', 'AdminDishesController@edit')->name('dishes-edit')->middleware('IsAdmin');
Route::post('/dishes-update/{id}', 'AdminDishesController@update')->name('dishes-update')->middleware('IsAdmin');
Route::get('/dishes-delete/{id}', 'AdminDishesController@destroy')->name('dishes-delete')->middleware('IsAdmin');

Route::get('/cart', 'CartController@index')->name('cart-index')->middleware('auth');
Route::post('/cart-store', 'CartController@store')->name('cart-store');
Route::get('/contact', 'ContactController@index')->name('contact-index');
Route::delete('/cart-delete/{id}', 'CartController@destroy')->name('cart-destroy')->middleware('auth');

Route::post('/order-cart', 'OrderController@store')->name('order-cart')->middleware('auth');
Route::get('/order', 'OrderController@index')->name('order')->middleware('auth');

Route::get('/users', 'UserController@index')->name('users-index')->middleware('IsAdmin');
Route::delete('/users-destroy/{id}', 'UserController@destroy')->name('users-destroy')->middleware('IsAdmin');

Route::get('/reservations', 'ReservationController@index')->name('reservations-index');
Route::get('/create-reservation', 'ReservationController@create')->name('create-reservation');
Route::post('/store-reservation', 'ReservationController@store')->name('store-reservation');

Route::get('/edit-reservation/{id}', 'ReservationController@edit')->name('edit-reservations');
Route::post('/update-reservation/{id}', 'ReservationController@update')->name('update-reservations');
Route::delete('/destroy-reservation/{id}', 'ReservationController@destroy')->name('destroy-reservations')->middleware('IsAdmin');

Route::get('/accept', 'PayseraController@accept')->name('accept');
Route::get('/cancel', 'PayseraController@cancel')->name('cancel');
Route::get('/callback', 'PayseraController@callback')->name('callback');
