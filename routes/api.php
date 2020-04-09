<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('/v1')->namespace('Dashboard')->name('backup.')->group(function(){
    Route::post('/backup', 'BackupController@store')->name('store');
    Route::put('/backup/{id}','BackupController@update')->name('update');
    Route::delete('/backup/{id}','BackupController@delete')->name('delete');
    Route::get('/backups/{user_id}','BackupController@get_all_backup')->name('get.all');
    Route::get('/backup/{id}','BackupController@get_backup')->name('get');
});


Route::prefix('/v1')->namespace('Dashboard')->name('ordem.')->group(function(){
    Route::post('/ordem','OrdemController@store')->name('store');
    Route::put('/ordem/{id}', 'OrdemController@update')->name('update');
    Route::delete('/ordem/{id}', 'OrdemController@delete')->name('delete');
    Route::get('/ordens/{user_id}','OrdemController@get_all_ordem')->name('get.all');
    Route::get('/ordem/{id}','OrdemController@get_ordem')->name('get');
});

