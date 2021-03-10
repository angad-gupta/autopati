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
    
       
    Route::get('brand', ['as' => 'brand.index', 'uses' => 'BrandController@index']);

    Route::get('brand/create', ['as' => 'brand.create', 'uses' => 'BrandController@create']);
    Route::post('brand/store', ['as' => 'brand.store', 'uses' => 'BrandController@store']);

    Route::get('brand/edit/{id}', ['as' => 'brand.edit', 'uses' => 'BrandController@edit'])->where('id','[0-9]+');
    Route::put('brand/update/{id}', ['as' => 'brand.update', 'uses' => 'BrandController@update'])->where('id','[0-9]+');

    Route::get('brand/delete/{id}', ['as' => 'brand.delete', 'uses' => 'BrandController@destroy'])->where('id','[0-9]+');
        
         
});