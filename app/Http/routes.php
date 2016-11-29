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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/superadmin/login', function () {
    return view('superadmin/login');
});

Route::post('/superadmin/login', ['as'=>'login', 'uses' => 'UserController@login']);

Route::get('/superadmin/user/create', ['uses' => 'UserController@create']);

Route::get('/common/header',function(){
	
	return view('common/header');

});

Route::get('/common/footer',function(){
	
	return view('common/footer');

});

Route::auth();

Route::get('/home', 'HomeController@index');
