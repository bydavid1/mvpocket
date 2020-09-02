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

//Auth



Route::prefix('auth')->group(function () {

    // Below mention routes are public, user can access those without any restriction.
    // Create New User
    Route::post('register', 'AuthController@register');

    // Login User
    Route::post('login', 'AuthController@login');
    
    // Refresh the JWT Token
    Route::get('refresh', 'AuthController@refresh');
    
    // Below mention routes are available only for the authenticated users.
    Route::middleware('auth:api')->group(function () {

        // Auth Routes

        Route::post('me', 'AuthController@me');
        Route::post('logout', 'AuthController@logout');

        // CRUD Routes

        Route::get('collection' , 'CollectionController@index');
        Route::get('collection/favorites' , 'CollectionController@getFavorites');
        Route::post('collection/store' , 'CollectionController@store');
        Route::put('collection/{id}/togglefav' , 'CollectionController@favorite');
        Route::put('collection/{id}/toggletheme' , 'CollectionController@theme');
        Route::get('collection/edit/{id}' , 'CollectionController@edit');
        Route::put('collection/update/{id}' , 'CollectionController@update');
        Route::delete('collection/delete/{id}' , 'CollectionController@destroy');

        Route::get('collection/{id}/sites' , 'SiteController@index');
        Route::get('fetchOpenGraph' , 'SiteController@getOpenGraph');
        Route::post('collection/{id}/site/store' , 'SiteController@store');
        Route::put('collection/site/update/{id}', 'SiteController@update');
        Route::put('collection/site/delete/{id}', 'SiteController@destroy');
    });
});
