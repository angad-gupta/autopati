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
    
       
    Route::get('servicemanagement', ['as' => 'servicemanagement.index', 'uses' => 'ServiceManagementController@index']);

    Route::get('servicemanagement/create', ['as' => 'servicemanagement.create', 'uses' => 'ServiceManagementController@create']);
    Route::post('servicemanagement/store', ['as' => 'servicemanagement.store', 'uses' => 'ServiceManagementController@store']);

    Route::get('servicemanagement/edit/{id}', ['as' => 'servicemanagement.edit', 'uses' => 'ServiceManagementController@edit'])->where('id','[0-9]+');
    Route::put('servicemanagement/update/{id}', ['as' => 'servicemanagement.update', 'uses' => 'ServiceManagementController@update'])->where('id','[0-9]+');

    Route::get('servicemanagement/delete/{id}', ['as' => 'servicemanagement.delete', 'uses' => 'ServiceManagementController@destroy'])->where('id','[0-9]+');
        
         
});