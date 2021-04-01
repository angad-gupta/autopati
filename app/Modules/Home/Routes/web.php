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
Route::get('/search/budget', ['as' => 'search.budget', 'uses' => 'HomeController@searchVehicleBudget']);
Route::get('/search/model', ['as' => 'search.model', 'uses' => 'HomeController@searchVehicleModel']);

Route::get('/car/all-brand', ['as' => 'list.car-brand', 'uses' => 'HomeController@listCarBrand']);
Route::get('/bike/all-brand', ['as' => 'list.bike-brand', 'uses' => 'HomeController@listBikeBrand']);

Route::get('/car/most-searched-car', ['as' => 'list.most-searched-car', 'uses' => 'HomeController@listMostSearchedVehicle']);
Route::get('/vehicle/deal-of-the-month', ['as' => 'list.deal-of-the-month', 'uses' => 'HomeController@listDealOfMonthVehicle']);
Route::get('/car/list-upcoming-car', ['as' => 'list.upcoming-car', 'uses' => 'HomeController@listUpcomingCar']);

Route::get('/brand/{id}', ['as' => 'list.brand.vehicles', 'uses' => 'HomeController@listBrandVehicle']);
Route::get('/car/detail/{id}', ['as' => 'car.detail', 'uses' => 'HomeController@carDetail']);

Route::post('/subscription', ['as' => 'subscription', 'uses' => 'HomeController@subscription']);

Route::get('/new', ['as' => 'new', 'uses' => 'HomeController@new']);

Route::get('/page/{slug}', ['as' => 'page', 'uses' => 'HomeController@page']);

Route::get('/compare', ['as' => 'compare', 'uses' => 'HomeController@compare']);
Route::post('/compare-vehicles', ['as' => 'compare.vehicles', 'uses' => 'HomeController@compareVehicles']);
Route::post('home-append-model-ajax', ['as' => 'home-append-model-ajax', 'uses' => 'HomeController@appendModel']);
Route::post('home-append-variant-ajax', ['as' => 'home-append-variant-ajax', 'uses' => 'HomeController@appendvariant']);


