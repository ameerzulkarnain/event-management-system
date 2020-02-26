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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('user', 'UserController');
Route::delete('/user/event/{event_id}', 'UserController@deleteUserEvent');

Route::get('/event', 'EventController@showEvent');
Route::get('/event/{event_id}/detail', 'EventController@getEventDetail');

Route::get('/company', 'CompanyController@showCompany');
Route::get('/company/{company_id}/detail', 'CompanyController@getCompanyDetail');
