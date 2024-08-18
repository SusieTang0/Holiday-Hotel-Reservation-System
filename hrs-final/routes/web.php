<?php

use Illuminate\Support\Facades\Route;

#Auth::routes();

#Route::get('/', function () {
 #   return view('welcome');
#});
/** web routes for login page */
Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::post('/', 'App\Http\Controllers\LoginController@loginSubmit')->name('login.submit');

Route::get('/logout','App\Http\Controllers\LoginController@logout')->name('logout');


/** web routes for registration page */
Route::get('/register', 'App\Http\Controllers\RegisterController@index')->name('register');

Route::post('/login', 'App\Http\Controllers\RegisterController@register_user')->name('register_user');


/** Verifies database connection */
Route::get('/db', function () {
    return view('db');
});


/** web routes for room search home page */
Route::get('/search', 'App\Http\Controllers\RoomController@index')->name('search');

Route::post('/search', 'App\Http\Controllers\RoomController@search')->name('room.search');

Route::get('/booking/{type_number}','App\Http\Controllers\BookingController@showRoom')->name('room.book');

Route::post('/booking/{room_numbers}','App\Http\Controllers\BookingController@bookRoom')->name('book.submit');

Route::get('/confirmation', function (){
    return view('confirmation');
})->name('confirmation');