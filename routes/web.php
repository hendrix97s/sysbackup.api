<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->prefix('dashboard')->namespace('Dashboard')->name('dash.')->group(function(){
    Route::post('/key', 'UserController@key')->name('key.generate');
});

Route::middleware('auth')->get('/register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::middleware('auth')->post('/register','Auth\RegisterController@register')->name('register');