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

Route::get('/', ['as' => 'index',function () {
    return view('auth.login');
}]);

/*Route::get('registro',function(){
	return view('registrer');
});*/

Route::group(['prefix' => 'admin','middleware'=>'auth'], function(){

	Route::get('/', ['as' => 'admin.index',function () {
	    return view('welcome');
	}]);

	Route::resource('users','UsersController');//genera rutas para cada metodo del controlador
	Route::get('users/{id}/destroy',[
		'uses' => 'UsersController@destroy',
		'as'   =>'admin.users.destroy'
		]);

	Route::resource('albumes', 'AlbumesController');
	Route::get('albumes/{id}/destroy',[
		'uses' => 'AlbumesController@destroy',
		'as'   =>'admin.albumes.destroy'
		]);

	Route::resource('images', 'ImagesController');
	Route::get('albumes/{image}/destroy',[
		'uses' => 'ImagesController@destroy',
		'as'   =>'admin.images.destroy'
		]);
	
	Route::resource('images', 'ImagesController');
	Route::get('images/ChangeOrderNumber/{id_album}/{id_image}',[
		'uses' => 'ImagesController@ChangeOrderNumber',
		'as'   =>'admin.images.ChangeOrderNumber'
		]);

	
	Route::resource('images', 'ImagesController');
	Route::post('images/Number',[
		'uses' => 'ImagesController@Number',
		'as'   =>'admin.images.Number'
		]);
});


Route::resource('registrer', 'RegistrerController');

// Authentication routes...
//el controlador AuthController laravel lo trae por defecto
Route::get('login', [
	'uses' => 'Auth\AuthController@getLogin',
	'as' => 'auth.login'
]);
Route::post('login', [
	'uses' => 'Auth\AuthController@postLogin',
	'as' => 'auth.login'
]);
Route::get('logout', [
	'uses' => 'Auth\AuthController@getLogout',
	'as' => 'auth.logout'
]);