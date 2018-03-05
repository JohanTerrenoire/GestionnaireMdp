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

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/login', 'Auth\LoginController@login');
Route::post('user/login', 'Auth\LoginController@postLogin')->name('user/login');

Route::get('user/register', 'Auth\RegisterController@register');
Route::post('user/register', 'Auth\RegisterController@create')->name('user/register');

Route::get('user/dashboard', function() {
  return view('dashboard');
})->middleware('auth');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
