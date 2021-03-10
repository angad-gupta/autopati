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
    
       
    Route::get('spec', ['as' => 'spec.index', 'uses' => 'SpecController@index']);

    Route::get('spec/create', ['as' => 'spec.create', 'uses' => 'SpecController@create']);
    Route::post('spec/store', ['as' => 'spec.store', 'uses' => 'SpecController@store']);

    Route::get('spec/edit/{id}', ['as' => 'spec.edit', 'uses' => 'SpecController@edit'])->where('id','[0-9]+');
    Route::put('spec/update/{id}', ['as' => 'spec.update', 'uses' => 'SpecController@update'])->where('id','[0-9]+');

    Route::get('spec/delete/{id}', ['as' => 'spec.delete', 'uses' => 'SpecController@destroy'])->where('id','[0-9]+');
        
         
});