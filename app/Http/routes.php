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
    return view('users.index');
});

Route::get('/superadmin/login', function () {
    return view('superadmin/login');
});

Route::post('/superadmin/login', ['as'=>'login', 'uses' => 'UserController@login']);

Route::get('/superadmin/user/create', ['uses' => 'UserController@create']);

Route::get('/superadmin/companytypes', ['uses' => 'SuperAdminController@listCompanyTypes']);

Route::get('/superadmin/managecompanytype', ['uses' => 'SuperAdminController@manageCompanyType']); 
Route::get('/superadmin/removecompanytype/{id}', ['uses' => 'SuperAdminController@removeCompanyType']);


Route::post('/superadmin/managecompanytype', ['uses' => 'SuperAdminController@manageCompanyType']);

Route::get('/superadmin/managecompanytype/{id}', ['uses' => 'SuperAdminController@manageCompanyType']);
Route::post('/superadmin/managecompanytype/{id}', ['uses' => 'SuperAdminController@manageCompanyType']);
Route::get('/superadmin/dashboard', ['uses'=>'SuperAdminController@dashboard']); 
Route::get('/superadmin', ['uses'=>'SuperAdminController@dashboard']); 

Route::get('/superadmin/clients', ['uses' => 'SuperAdminController@listClients']);
Route::get('/superadmin/manageclients', ['uses' => 'SuperAdminController@manageClients']);  
Route::post('/superadmin/manageclients', ['uses' => 'SuperAdminController@addClients']);
Route::get('/superadmin/manageclients/{id}', ['uses' => 'SuperAdminController@addClients']);
Route::post('/superadmin/manageclients/{id}', ['uses' => 'SuperAdminController@addClients']);  
Route::get('/superadmin/removeclients/{id}', ['uses' => 'SuperAdminController@deleteClients']);



Route::get('/common/header',function(){
	
	return view('common/header');

});

Route::get('/common/footer',function(){
	
	return view('common/footer');

});

Route::auth();

Route::get('/home', 'HomeController@index');  
Route::get('/signout', ['uses'=>'UserController@logout']);
