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

Route::get('collection' , 'CollectionController@index'); 
Route::post('collection/store' , 'CollectionController@store'); 
Route::get('collection/edit/{id}' , 'CollectionController@edit'); 
Route::put('collection/update/{id}' , 'CollectionController@update'); 
Route::delete('collection/delete/{id}' , 'CollectionController@destroy'); 
