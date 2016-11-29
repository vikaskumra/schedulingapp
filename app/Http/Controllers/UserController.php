<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use App\User;
use Hash;  
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
		public function login()
		{
		 
              $email=Input::get('email');
			$password=md5(Input::get('password'));		   
		   $rules = array(
    'email'    => 'required|email', // make sure the email is an actual email
    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
);  


               $validator = Validator::make(Input::all(), $rules);  
			   if ($validator->fails()) {
    return Redirect::to('/superadmin/login')
        ->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
}         
                else {

    // create our user data for the authentication
    $userdata = array(
        'email'     => Input::get('email'),
        'password'  => Input::get('password')
    );

    // attempt to do the login
    if (Auth::attempt($userdata)) {

        // validation successful!
        // redirect them to the secure section or whatever
        // return Redirect::to('secure');
        // for now we'll just echo success (even though echoing in a controller is bad)
        echo 'SUCCESS!';

    } else {        

        // validation not successful, send back to form 
        return Redirect::to('/superadmin/login')->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password'));

    }
			   
			   
			   
		}	
			
			// $data=array('email'=>$email,'password'=>$password);
			  //dd(Auth::attempt(['email'=>Input::get('email'), 'password'=>md5(Input::get('password'))]));
		
			  
		
		}
		
		public function create()
		{
			$user= new User;
			$user->first_name='murli';
			$user->last_name='rana';
			$user->email='rana@gmail.com';
			$user->password=md5('awesome');
			$user->save();
		}
}
