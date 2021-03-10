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
    
       
    Route::get('news', ['as' => 'news.index', 'uses' => 'NewsController@index']);

    Route::get('news/create', ['as' => 'news.create', 'uses' => 'NewsController@create']);
    Route::post('news/store', ['as' => 'news.store', 'uses' => 'NewsController@store']);

    Route::get('news/edit/{id}', ['as' => 'news.edit', 'uses' => 'NewsController@edit'])->where('id','[0-9]+');
    Route::put('news/update/{id}', ['as' => 'news.update', 'uses' => 'NewsController@update'])->where('id','[0-9]+');

    Route::get('news/delete/{id}', ['as' => 'news.delete', 'uses' => 'NewsController@destroy'])->where('id','[0-9]+');
        
         
});