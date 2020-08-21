<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('collection' , 'CollectionController@index');
Route::post('collection/store' , 'CollectionController@store');
Route::get('collection/edit/{id}' , 'CollectionController@edit');
Route::put('collection/update/{id}' , 'CollectionController@update');
Route::delete('collection/delete/{id}' , 'CollectionController@destroy');

Route::get('collection/{id}/sites' , 'SiteController@index');
Route::get('fetchOpenGraph' , 'SiteController@getOpenGraph');
Route::post('collection/{id}/site/store' , 'SiteController@store');
Route::put('collection/site/update/{id}', 'SiteController@update');
Route::put('collection/site/delete/{id}', 'SiteController@destroy');