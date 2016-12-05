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

/*
Route::get('/superadmin/login', function () {
    return view('superadmin/login');
});
*/
//Route::post('/superadmin/login', ['as'=>'login', 'uses' => 'UserController@login']);

 // Superadmin Roles Group
Route::group(['middleware' => 'ACL:superadmin'],function () {

Route::get('/superadmin/user/create', ['uses' => 'UserController@create']);

Route::get('/superadmin/companytypes', ['uses' => 'SuperAdminController@listCompanyTypes']);

Route::get('/superadmin/managecompanytype', ['uses' => 'SuperAdminController@manageCompanyType']); 
Route::get('/superadmin/removecompanytype/{id}', ['uses' => 'SuperAdminController@removeCompanyType']);


Route::post('/superadmin/managecompanytype', ['uses' => 'SuperAdminController@manageCompanyType']);

Route::get('/superadmin/managecompanytype/{id}', ['uses' => 'SuperAdminController@manageCompanyType']);
Route::post('/superadmin/managecompanytype/{id}', ['uses' => 'SuperAdminController@manageCompanyType']);
Route::get('/superadmin/dashboard', ['uses'=>'SuperAdminController@dashboard'])->name('superadmindashboard'); 
Route::get('/superadmin', ['uses'=>'SuperAdminController@dashboard'])->name('superadmindashboard'); 

Route::get('/superadmin/clients', ['uses' => 'SuperAdminController@listClients']);
Route::get('/superadmin/manageclients', ['uses' => 'SuperAdminController@manageClients']);  
Route::post('/superadmin/manageclients', ['uses' => 'SuperAdminController@addClients']);
Route::get('/superadmin/manageclients/{id}', ['uses' => 'SuperAdminController@addClients']);
Route::post('/superadmin/manageclients/{id}', ['uses' => 'SuperAdminController@addClients']);  
Route::get('/superadmin/removeclients/{id}', ['uses' => 'SuperAdminController@deleteClients']);

}); // Superadmin Roles Group

// Main Client (Owner) routes
Route::group(['middleware' => 'ACL:owner'],function () {

	Route::get('/user/setuproles', ['uses' => 'RolesController@index'])->name('setuproles');
	Route::match(['get','post'],'user/addrole', ['uses'=>'RolesController@addrole'])
	->name('addrole'); 
	Route::match(['get','post'],'user/editrole/{id}', ['uses'=>'RolesController@editrole'])
	->name('editrole'); 

		Route::get('/user/deleterole', ['uses' => 'RolesController@deleteRole'])->name('deleterole');

	Route::get('/user/setuptasktypes', ['uses' => 'TaskTypesController@index'])->name('setuptasktypes');
	Route::match(['get','post'],'user/addtasktype', ['uses'=>'TaskTypesController@addtasktype'])
	->name('addtasktype'); 
	Route::match(['get','post'],'user/edittasktype/{id}', ['uses'=>'TaskTypesController@edittasktype'])
<<<<<<< HEAD
	->name('edittasktype');

	Route::get('/user/tasks', ['uses' => 'TasksController@index'])->name('setuptasks');
	Route::match(['get','post'],'user/addtask', ['uses'=>'TasksController@addtask'])
	->name('addtask'); 
	Route::match(['get','post'],'user/edittask/{id}', ['uses'=>'TasksController@edittask'])
	->name('edittask'); 
=======
	->name('edittasktype'); 
	
	Route::get('user/setupteammember', ['uses'=>'UserController@showTeammember'])->name('setupteammember');
	Route::match(['get','post'],'user/addteammember', ['uses'=>'UserController@addTeammember'])
	->name('addteammember');  
>>>>>>> 7066d08ded9280414095c13444ddf9310c4a813f
	


});


// Main Client (Owner) routes

Route::get('/common/header',function(){
	
	return view('common/header');

}); 
Route::get('/users/testmail', 'UserController@testing');

Route::get('/common/footer',function(){
	
	return view('common/footer');

});





Route::get('/home', 'UserController@index');  
Route::get('/signout', ['uses'=>'UserController@logout']);  
Route::match(['get','post'],'users/login', ['uses'=>'UserController@login'])
->name('login'); 

Route::match(['get', 'post'],'/user/signup',['uses'=>'UserController@signup'])->name("usersignup");
Route::get('/user/dashboard', 'UserController@dashboard')->name('userdashboard');



//Route::get('users/signup',['uses'=>'UserController@signup']);  
/*Route::get('users/signup',function(){
	return view('users/signup');
});*/

Route::get('/users/common/header', function(){
	return view('users/common/header');
}); 
Route::get('/users/common/footer', function(){
	return view('users/common/footer');
});    


Route::get('/mailtest', 'UserController@mailing');  
Route::get('/user/security/token/{token}', ['uses'=>'UserController@teammemberSignup'])->name('teammember');
Route::post('/user/security/token/{token}', ['uses'=>'UserController@teammemberSignup']);  
Route::match(['get', 'post'], 'user/editteammember/{id}', ['uses'=>'UserController@editTeammember'])
                                  ->name('editteammember'); 


