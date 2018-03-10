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

Route::get('/', 'HomeController@renderHome');

Route::get('/login', 'AuthenticationController@renderLogin');

Route::post('/login', 'AuthenticationController@login');
Route::get('/logout', 'AuthenticationController@logout');
Route::get('/register', 'AuthenticationController@renderRegister');
Route::post('/register', 'AuthenticationController@register');
Route::post('checkUsername', 'AuthenticationController@checkUsername');
Route::get('/rent', 'RentACarController@render');

Route::group(['middleware' => 'checkAuth'], function (){
    Route::get('/postcar', 'UploadCarsController@render');
    Route::post('/getmodel', 'UploadCarsController@getModel');
    Route::post('/postcar', 'UploadCarsController@uploadCar');
    Route::get('/mycars', 'MyCarsController@render');
    Route::get('/auction', 'MyCarsController@proba');
});

Route::group(['prefix' => '/ajax'], function (){
   Route::post('/addforrent', 'MyCarsController@addForRent');
   Route::post('/removerent', 'MyCarsController@removeRent');
   Route::post('/rentacar', 'RentACarController@rentACar');
   Route::post('/rentfinished', 'RentACarController@rentFinished');
});