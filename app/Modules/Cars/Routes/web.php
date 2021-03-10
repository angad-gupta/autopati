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
    
       
    Route::get('cars', ['as' => 'cars.index', 'uses' => 'CarsController@index']);

    Route::get('cars/create', ['as' => 'cars.create', 'uses' => 'CarsController@create']);
    Route::post('cars/store', ['as' => 'cars.store', 'uses' => 'CarsController@store']);

    Route::get('cars/edit/{id}', ['as' => 'cars.edit', 'uses' => 'CarsController@edit'])->where('id','[0-9]+');
    Route::put('cars/update/{id}', ['as' => 'cars.update', 'uses' => 'CarsController@update'])->where('id','[0-9]+');

    Route::get('cars/delete/{id}', ['as' => 'cars.delete', 'uses' => 'CarsController@destroy'])->where('id','[0-9]+');
        
    Route::post('append-model-ajax', ['as' => 'append-model-ajax', 'uses' => 'CarsController@appendModel']);
    
    Route::post('append-variant-ajax', ['as' => 'append-variant-ajax', 'uses' => 'CarsController@appendvariant']);

	Route::get('cars/profile', ['as' => 'cars.profile', 'uses' => 'CarsController@profile']);

	Route::post('feature/storePhotoFeature', ['as' => 'feature.storePhotoFeature', 'uses' => 'PhotoFeatureController@store']);   
    Route::post('feature/storePhotoGallery', ['as' => 'feature.storePhotoGallery', 'uses' => 'PhotoFeatureController@storeGallery']);   
    Route::post('feature/storePhotoGalleryImages', ['as' => 'feature.storePhotoGalleryImages', 'uses' => 'PhotoFeatureController@storePhotoGalleryImages']);   
    Route::get('feature/delete/{id}', ['as' => 'feature.delete', 'uses' => 'PhotoFeatureController@destroy'])->where('id','[0-9]+');

    Route::get('gallery/deleteImages', ['as' => 'gallery.deleteImages', 'uses' => 'PhotoFeatureController@deleteGalleryImage']);
         
    Route::post('append-feature-ajax', ['as' => 'append-feature-ajax', 'uses' => 'PhotoFeatureController@appendFeature']);

    Route::post('feature/storeCarFeatures', ['as' => 'feature.storeCarFeatures', 'uses' => 'PhotoFeatureController@storeCarFeatures']);   

});
