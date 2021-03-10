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



Route::group(['prefix' => 'admin', 'middleware' => ['auth','permission']], function () {
    
       
    Route::get('configuration', ['as' => 'configuration.index', 'uses' => 'ConfigurationController@index']);

    Route::get('configuration/create', ['as' => 'configuration.create', 'uses' => 'ConfigurationController@create']);
    Route::post('configuration/store', ['as' => 'configuration.store', 'uses' => 'ConfigurationController@store']);

    Route::get('configuration/edit/{id}', ['as' => 'configuration.edit', 'uses' => 'ConfigurationController@edit'])->where('id','[0-9]+');
    Route::post('configuration/update', ['as' => 'configuration.update', 'uses' => 'ConfigurationController@update']);

    Route::get('configuration/delete/{id}', ['as' => 'configuration.delete', 'uses' => 'ConfigurationController@destroy'])->where('id','[0-9]+');
    Route::get('configuration/deleteVal/{id}', ['as' => 'configuration.deleteVal', 'uses' => 'ConfigurationController@deleteVal'])->where('id','[0-9]+');
        
	Route::get('configuration/view', ['as' => 'configuration.view', 'uses' => 'ConfigurationController@view']);

         
});