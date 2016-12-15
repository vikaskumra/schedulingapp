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
use App\Roles;
use App\Jobs;   
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


		public function signup()
		{
			if(!empty(Input::get('email')))
			{
					$postData=Input::get();
					

					$rules = ['email'=>'unique:users', 'password'=>'required|same:confpass'];
					$validation = Validator::make(Input::all(), $rules);
				if($validation->fails())
				{
						//return redirect()->back()->withErrors($validation)->withInput();
							return redirect()->route('usersignup')->withErrors($validation)->withInput();

						 
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
					$company->phone =		Input::get('phone');   
					$company->save();
					$user = new User;
					$user->first_name =     Input::get('first_name');
					$user->last_name =      Input::get('last_name');
					$user->company_id =     $company->id;
					$user->email =          Input::get('email');
					$user->password = Hash::make(Input::get('password'));
					$user->save();  
                    $trade_id = Input::get('trade');
                    $trade_data = array();					
					foreach($trade_id as $tradeId){
						$trade_data[] = ['trade_id'=>$tradeId, 'company_id'=>$company->id];                  
					}
                    DB::table('company_trades')->insert($trade_data);			
					return redirect()->route('login');  
				}
					
			}	
			else{
					$trades = DB::table('trades')->get();
					$company_type = CompanyTypes::all();
					return view('users.signup')->with(['company_type'=>$company_type, 'trades'=>$trades]);
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
		    
		
		return view('users.teammembers')
		       ->with(['team_members'=>$team_members, 'teammember'=>$teammember]);
	}  
	
	public function addTeammember(){  
	
	    $company = Company::with('users')->where('id', '=', Auth::user()->company_id)->get();  
		$roles = Roles::where('company_id', '=', Auth::user()->company_id)->get();
	      
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
          $teammember->user_roleid = implode(",", Input::get('user_roles'));	  
           $user_roles_id = Input::get('user_roles'); 
           $teammember->save();		   
		   foreach($user_roles_id as $id){
			   $user_roles_id = ['role_id'=> $id,
                    			   'auth_id'=>Auth::user()->id,
   								   'company_id'=>Auth::user()->company_id,
								   'user_id'=>$teammember->id ];  
      								   
			  DB::table('user_roles')->insert($user_roles_id);
		   } 
		   
          		   
        		 
		 

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
				
				
		/*  
        $data = file_get_contents('/home3/asquares/public_html/scheduling/resources/views/users/testmail.blade.php');
		 $search = ['{{$auth_first}}','{{$auth_last}}','{{$first_name}}','{{$last_name}}','{{$team_token}}'];
		 $replace = [Auth::user()->first_name,Auth::user()->last_name,$teammember->first_name,$teammember->last_name,$teammember->team_token ];
		 $message = str_replace($search, $replace, $data);
		 $to = $teammember->email; 
		 $subject = 'SchedulingApp';
		 $user_mail = new User;  
		 $mail = $user_mail->sendMail($to, $message, $subject);
		*/		
		 
		 
		 
		 
		  return redirect('/user/setupteammember');  
		
		
		
		}
		else{
			  return view('users.teammember')->with(['company'=>$company, 'roles'=>$roles]);
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
		 $rules = ['password'=>'required|same:confpass'];
		 $validator = Validator::make(Input::all(), $rules);
		 
		 
		
		 
          if(!empty(Input::get('first_name'))){  
		        if($validator->fails())
		 {
			 return Redirect::back()->withErrors($validator)->withInput();
		 }
		    else{
		  
			  $update = DB::table('users')->where('team_token', '=', $token)->update($data);  
			  return redirect('user/teamlogin');
		       }		
		  }		  
         
          else{
			  return view('users.teammembersignup')->with(['team_token'=>$team_token]);
		  }		 
          
		 
         		 		       
          
	   		
	    
		  
	     }	  
		 
		 public function editTeammember($id){
			    $user = User::findOrFail($id);  
				$rules = ['password'=>'same:confpass'];
				$validator = Validator::make(Input::all(), $rules);  
				$user_all_roles = DB::table('user_roles')
				                  ->where('user_id', '=', $user->id)
								  ->where('company_id','=', $user->company_id)->get();  
					$userrole_title = array();
					
					foreach($user_all_roles as $role)
					{
						 $role->role_id;  
						$Roles = new Roles;
						$userrole_title[] = $Roles->getRoleTitle($role->role_id);    
						
                        						
					}  
					$userrole_title = implode(",",$userrole_title );
					
						              
				if(!empty(Input::get('first_name'))){                
				$user->first_name = Input::get('first_name');
				$user->last_name =  Input::get('last_name');
				$user->email =      Input::get('email');
				if(!empty(Input::get('password')))
				{
				  $user->password =   Hash::make(Input::get('password'));  
				}
				if($validator->fails())
				{
					return Redirect::back()->withErrors($validator)->withInput(); 
				}
				else{
				$user->save();				   
				return redirect('user/setupteammember');
				}
				}  
				
				else{
					return view('users.editteammember')->with(['user'=>$user, 'userrole_title'=>$userrole_title]);
				}
		 }  
		 
		 
		 public function teamLogin(){
			 return view('users.teammemberlogin');
		 }  
		 
		 
		 
		 
		 
		 public function getUserByRolesid($id){
			 $roles_user = DB::table('user_roles')->where('user_roles.company_id', '=', Auth::user()->company_id)
			             ->where('role_id', '=', $id)
			          
			          ->join('users', 'user_roles.user_id', '=', 'users.id')->get();  
                        	
                 return  json_encode($roles_user);						 

		 }  


         public function commonFooter(){
			 $tasktypes = DB::table('tasktypes')->where('company_id', '=', Auth::user()->company_id)->get();
			 $roles = DB::table('roles')->where('company_id', '=', Auth::user()->company_id)->get(); 
			 return view('common/footer')->with(['tasktypes'=>$tasktypes, 'roles'=>$roles]);
		 }   


         public function sendLoginToContacts(){
			 return view('users.contactmail');
		 }		 


         	 
		
		
		
		
}
