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
    
       
    Route::get('vehiclemodel', ['as' => 'vehiclemodel.index', 'uses' => 'VehicleModelController@index']);

    Route::get('vehiclemodel/create', ['as' => 'vehiclemodel.create', 'uses' => 'VehicleModelController@create']);
    Route::post('vehiclemodel/store', ['as' => 'vehiclemodel.store', 'uses' => 'VehicleModelController@store']);

    Route::get('vehiclemodel/edit/{id}', ['as' => 'vehiclemodel.edit', 'uses' => 'VehicleModelController@edit'])->where('id','[0-9]+');
    Route::post('vehiclemodel/update', ['as' => 'vehiclemodel.update', 'uses' => 'VehicleModelController@update']);
    Route::post('vehiclemodel/updateVar', ['as' => 'vehiclemodel.updateVar', 'uses' => 'VehicleModelController@updateVar']);

    Route::get('vehiclemodel/delete/{id}', ['as' => 'vehiclemodel.delete', 'uses' => 'VehicleModelController@destroy'])->where('id','[0-9]+');
    Route::get('vehiclemodel/deleteVar/{id}', ['as' => 'vehiclemodel.deleteVar', 'uses' => 'VehicleModelController@deleteVar'])->where('id','[0-9]+');
         
});