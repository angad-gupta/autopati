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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/search', ['as' => 'search', 'uses' => 'HomeController@searchVehicle']);

Route::get('/car/all-brand', ['as' => 'list.car-brand', 'uses' => 'HomeController@listCarBrand']);
Route::get('/bike/all-brand', ['as' => 'list.bike-brand', 'uses' => 'HomeController@listBikeBrand']);

Route::get('/car/most-searched-car', ['as' => 'list.most-searched-car', 'uses' => 'HomeController@listMostSearchedCar']);

Route::get('/brand/{id}', ['as' => 'list.brand.vehicles', 'uses' => 'HomeController@listBrandVehicle']);
Route::get('/car/detail/{id}', ['as' => 'car.detail', 'uses' => 'HomeController@carDetail']);

Route::post('/subscription', ['as' => 'subscription', 'uses' => 'HomeController@subscription']);


