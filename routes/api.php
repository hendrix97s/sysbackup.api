<?php
use Illuminate\Support\Facades\Route;

// BACKUP
Route::middleware('auth:api')->prefix('/v1')->namespace('Dashboard')->name('backup.')->group(function(){
    Route::post('/backup', 'BackupController@store')->name('store');
    // Route::put('/backup/{id?}','BackupController@update')->name('update');
    // Route::delete('/backup/{id?}','BackupController@delete')->name('delete');
    Route::get('/backups/{user_id?}','BackupController@get_all')->name('get.all');
    Route::get('/backup/{id?}','BackupController@get')->name('get');
});

// ORDEM
Route::middleware('auth:api')->prefix('/v1')->namespace('Dashboard')->name('ordem.')->group(function(){
    Route::post('/ordem','OrdemController@store')->name('store');
    Route::put('/ordem/{id?}', 'OrdemController@update')->name('update');
    Route::delete('/ordem/{id}', 'OrdemController@delete')->name('delete');
    Route::get('/ordens/{clinic_id?}','OrdemController@get_all')->name('get.all');
    Route::get('/ordem/{id?}','OrdemController@get')->name('get');
});

//CLINIC
Route::middleware('auth:api')->prefix('/v1')->namespace('Dashboard')->name('clinic.')->group(function(){
    Route::post('/clinic','ClinicController@store')->name('store');
    Route::put('/clinic/{id?}', 'ClinicController@update')->name('update');
    Route::delete('/clinic/{id?}', 'ClinicController@delete')->name('delete');
    Route::get('/clinic/{id?}','ClinicController@get')->name('get');
    Route::get('/clinics','ClinicController@get_all')->name('get.all');
});

// ADMIN
Route::middleware('auth:api')->prefix('/v1')->namespace('Dashboard')->name('admin.')->group(function(){
    Route::post('/admin','AdminController@store')->name('store');
    Route::put('/admin/{id?}', 'AdminController@update')->name('update');
    Route::delete('/admin/{id?}', 'AdminController@delete')->name('delete');
    Route::get('/admin/{id?}','AdminController@get')->name('get');
    Route::get('/admins','AdminController@get_all')->name('get.all');
});

