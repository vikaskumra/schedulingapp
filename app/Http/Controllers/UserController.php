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
use App\CompanyTypes;
use App\Company;   
use Mail;  
use DB;

class UserController extends Controller
{
    //
		public function login()
		{
			//return view('superadmin/login');

				if(!empty(Input::get('email'))):

						$email=Input::get('email');
						$password=md5(Input::get('password'));		   
						$rules = array(
						'email'    => 'required|email', // make sure the email is an actual email
						'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
						);  


						$validator = Validator::make(Input::all(), $rules);  
			   			if ($validator->fails()) 
						   {
							return Redirect()->Route('login')
							->withErrors($validator) // send back all errors to the login form
							->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
						   }         
                		   else
						    {

								// create our user data for the authentication
									$userdata = array(
										'email'     => Input::get('email'),
										'password'  => Input::get('password')
									);

									// attempt to do the login
									if (Auth::attempt($userdata)) {
										
										if(Auth::user()->user_type=='superadmin')
										{
											return redirect()->route('superadmindashboard');
										}
										else{
											return redirect()->route('userdashboard');
										}

										// validation successful!
										// redirect them to the secure section or whatever
										// return Redirect::to('secure');
										// for now we'll just echo success (even though echoing in a controller is bad)
										echo 'SUCCESS!';
										//return redirect('/superadmin/dashboard');

									} else {        

										// validation not successful, send back to form 
										return Redirect()->Route('login')->withErrors($validator) // send back all errors to the login form
										->withInput(Input::except('password'));

									}
			   
			   
			   
							}
							else:
									return view('superadmin/login');
							endif;	
			
			// $data=array('email'=>$email,'password'=>$password);
			  //dd(Auth::attempt(['email'=>Input::get('email'), 'password'=>md5(Input::get('password'))]));
		
			  
		
		}
		

		public function dashboard()
		{
				// add code to show user Dashboard here...
				return view('users/dashboard');
		}

		public function create()
		{
		/*	$user= new User;
			$user->first_name='admin';
			$user->last_name='admin';
			$user->email='admin@admin.com';
			$user->password=Hash::make('admin1234');
			$user->save();
			*/
			
			
		}  
		
		
		public function logout(){
			Auth::logout();
			//  change redirect based on user type (Ex. client or admin?) 
			return redirect()->route('login');
		}


		function signup()
		{
			if(!empty(Input::get('email')))
			{
					$postData=Input::get();
					

					$rules = ['password'=>'required|same:confpass'];
					$validation = Validator::make(Input::all(), $rules);
				if($validation->fails())
				{
						//return redirect()->route('')->withErrors($validation)->withInput();
						//	return redirect()->route('usersignup')->withErrors($validation)->withInput();

						
						$company_type = CompanyTypes::all();
						return view('users.signup')->with(['company_type'=>$company_type]);
				}	   
		
				else
				{	   
					//echo 'else';
					//exit;
					$company = new Company;
					$company->company_name = Input::get('company_name');
					$company->company_type = Input::get('company_type');
					$company->address =      Input::get('address');
					$company->city =         Input::get('city');
					$company->state =        Input::get('state');
					$company->country =      Input::get('country');
					$company->Phone =		Input::get('phone');   
					$company->save();
					$user = new User;
					$user->first_name =     Input::get('first_name');
					$user->last_name =      Input::get('last_name');
					$user->company_id =     $company->id;
					$user->email =          Input::get('email');
					$user->password = Hash::make(Input::get('password'));
					$user->save();  
					return redirect()->route('login');  
				}
					
			}	
			else{
					$company_type = CompanyTypes::all();
					return view('users.signup')->with(['company_type'=>$company_type]);
			}
			
		}   



              public function index()
    {
        return view('users.index');
        
    }  
	
	public function showTeammember(){  
	      $teammember = DB::table('users')
		              ->where('user_type', '=', 'team-member')
					  ->where('company_id', '=', Auth::user()->company_id)
					  ->get();
		   //print_r(json_encode($teammember));  
		   $team_members = json_encode($teammember);
		
		return view('users.teammembers')->with(['team_members'=>$team_members]);
	}  
	
	public function addTeammember(){  
	
	    $company = Company::with('users')->where('id', '=', Auth::user()->company_id)->get();
	      
		if(!empty(Input::get('id'))){
			
		}  
		else if(!empty(Input::get('first_name'))){  
		   
		 foreach($company as $comp)
		 {
			 $company_id =  $comp->id;
		 }
		 
		 $teammember = new User;
		 $teammember->first_name = Input::get('first_name');
		 $teammember->last_name =  Input::get('last_name');  
         $teammember->user_type = 'team-member';
          $teammember->company_id = $company_id;
          $teammember->email = Input::get('email');	
          $teammember->pending_invite = 1;
          $teammember->team_token = sha1(uniqid());	  
        		 
		 $teammember->save();    

           $data =      ['email'=>$teammember->email, 
		                 'first_name'=>$teammember->first_name,
						 'last_name'=>$teammember->last_name,
						 'auth_first'=>Auth::user()->first_name,
						 'auth_last'=>Auth::user()->last_name,
						 'team_token'=>$teammember->team_token
						 ];		 
		 
		 
		 Mail::send('/users/testmail', $data, function ($message) use($data)
				{
					$message->to($data['email'])->subject('SchedulingApp!');
					
				});
		 
		 
		 
		 
		  return redirect('/user/setupteammember');
		
		
		
		}
		else{
			  return view('users.teammember')->with(['company'=>$company]);
		}
		   
		
		
	}   


     public function testing(){
		 $user = User::orderBy('created_at', 'desc')->first();  	 
         return view('/users/testmail')->with(['user'=>$user]);	 
	 }	
		
	public function teammemberSignup($token){    
	  $teammember = DB::table('users')->where('team_token', '=', $token)->get();  
	  //var_dump($teammember);  	   
		$team_token = $teammember[0]->team_token;
        $first_name = Input::get('first_name');
		$last_name =  Input::get('last_name');
		$email =      Input::get('email');
		$password =   Hash::make(Input::get('password'));
	    $data = [
	
	     'first_name'=>$first_name,
		 'last_name'=>$last_name,
		 'email'=>$email,
		 'password'=>$password,
		 'team_token'=>'',
		 'pending_invite'=>0
		 ];   
          if(!empty(Input::get('first_name'))){
			  $update = DB::table('users')->where('team_token', '=', $token)->update($data);  
			  return redirect('users.teammemberlogin');
		  }		 
         
          else{
			  return view('users.teammembersignup')->with(['team_token'=>$team_token]);
		  }		 
          
         		 		       
          
	   		
	    
		  
	}	
		
		
		
		
}
