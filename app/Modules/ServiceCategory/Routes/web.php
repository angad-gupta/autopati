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
    
       
    Route::get('servicecategory', ['as' => 'servicecategory.index', 'uses' => 'ServiceCategoryController@index']);

    Route::get('servicecategory/create', ['as' => 'servicecategory.create', 'uses' => 'ServiceCategoryController@create']);
    Route::post('servicecategory/store', ['as' => 'servicecategory.store', 'uses' => 'ServiceCategoryController@store']);

    Route::get('servicecategory/edit/{id}', ['as' => 'servicecategory.edit', 'uses' => 'ServiceCategoryController@edit'])->where('id','[0-9]+');
    Route::put('servicecategory/update/{id}', ['as' => 'servicecategory.update', 'uses' => 'ServiceCategoryController@update'])->where('id','[0-9]+');

    Route::get('servicecategory/delete/{id}', ['as' => 'servicecategory.delete', 'uses' => 'ServiceCategoryController@destroy'])->where('id','[0-9]+');
        
         
});
