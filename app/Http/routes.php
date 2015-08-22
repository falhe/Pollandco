<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('profil', ['uses' => 'UsersController@edit', 'as' => 'profil']);
Route::post('profil', ['uses' => 'UsersController@update']);

/**
*
* ADMIN
*
**/
Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function() {

    Route::controller('/', 'AdminController');
    //Route::get('logout', 'AuthController@logout');

    Route::group(['middleware' => 'admin'], function(){
        Route::controller('/profiladmin/{id}', 'AdminController');
        // Route::resource('article', 'ArticleController');
        // Route::resource('gallery', 'GalleryController');
        // Route::resource('user', 'UserController');
    });
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/**
*
* REST
*
**/
Route::get('/searchusers', 'RestController@searchusers');


