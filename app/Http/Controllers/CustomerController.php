<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests; 
use App\Customers;
use App\User;   
use App\CustomerSiteLocations;  
use App\CustomerDevelopments;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use DB; 
use Hash;  
use Mail;

class CustomerController extends Controller
{
    public function showCustomers(){  
	         $customers = DB::table('customers')->where('created_by', '=', Auth::user()->id)
			                         ->where('company_id', '=', Auth::user()->company_id)
									 ->get();
			 return view('users.customers')->with(['customers'=>$customers]);
		 }	

         public function addCustomer(){
			 if(!empty(Input::get('first_name'))){
				 $customer = new Customers;
				 $customer->created_by = Auth::user()->id;
				 $customer->company_id = Auth::user()->company_id;
				 if(!empty(Input::get('company_name'))){
				     $customer->company_name = Input::get('company_name');	 
				 }
				 
				 $customer->address = Input::get('address');
				 $customer->first_name = Input::get('first_name');
				 $customer->last_name = Input::get('last_name');
				 $customer->email = Input::get('email');
				 $customer->phone = Input::get('phone');
				 $customer->city = Input::get('city');
				 $customer->state = Input::get('state');
				 $customer->country = Input::get('country');
				 if(!empty(Input::get('notes'))){
				 $customer->notes = Input::get('notes');
				 }  
				 $customer->save();
				 
				 $contact_data = [
				 'customer_id'=>$customer->id,
				 'auth_id'=>Auth::user()->id,
				 'company_id'=>Auth::user()->company_id
				 ];  
				 
				 DB::table('customer_contacts')->insert($contact_data);            				 
				 return redirect()->route('managecustomers')->with('message', 'Record has been added successfully!');;
			   
			 }
			 else{  
			     $customer = new Customers; 
				 
			    return view('users.customer')->with(['customer'=>$customer]);
			 }
		 }   

           public function editCustomer($id){
			     $customer = Customers::findOrFail($id);
			   if(!empty(Input::get('first_name'))){
				   $customer->company_name = Input::get('company_name');
                   $customer->address = Input::get('address');
                   if(!empty(Input::get('notes'))){
					$customer->notes = Input::get('notes');   
				   }
				   
                   $customer->first_name = Input::get('first_name');
                   $customer->last_name = Input::get('last_name');
				   $customer->email = Input::get('email');
				   $customer->phone = Input::get('phone');
				   $customer->city = Input::get('city');
				   $customer->state = Input::get('state');
				   $customer->country = Input::get('country');	
                   $customer->save();
                   return redirect()->route('managecustomers')->with('message', 'Record has beed updated succesfully!');				   
			   }  
			   else{
				   
			      return view('users.customer')->with(['customer'=>$customer]);
			   }
			   
			   
		   }
		 

           public function manageContacts($id='')
		   {
			   $customer = Customers::findOrFail($id);  
			   $customer_id =$customer->id;			   			   
			   $contacts = DB::table('users')->where('company_id', '=', Auth::user()->company_id)
			                                 ->where('customer_contactid', '=', $customer_id)->get();  
			  
			
			   return view('users.contacts')->with(['contacts'=>$contacts, 'customer'=>$customer]);   
			   
			   
		   }  
		   
		   
		   public function addContacts($id){  
		      
			   if(!empty(Input::get('first_name'))){
				      $contact = new User;
                  $contact->first_name = Input::get('first_name');
				  $contact->last_name =  Input::get('last_name');
				  $contact->user_type =  'customer-contact';
				  $contact->company_id = Auth::user()->company_id;
				  $contact->customer_contactid = $id;
				  $contact->email = Input::get('email');
				  $contact->phone = Input::get('phone');
				  $contact->password = Hash::make(Input::get('password'));
				  $contact->communication_preference = Input::get('comm_preference');
                  if(!empty(Input::get('notes'))){				  
				  $contact->notes = Input::get('notes');
				  } 
				  $contact->save();
				  
				  $contact_id = $contact->id;
				  $contact_role = Input::get('role'); 
				  $contact_auth_id = Auth::user()->id;
				  $contact_company_id = Auth::user()->company_id;				  
				  foreach($contact_role as $role)
				  {				  
                            $contact_user_roles = [
				             'user_id'=> $contact_id,
							 'role_id'=> $role,
							 'auth_id'=> $contact_auth_id,
							 'company_id'=> $contact_company_id
				  ];                       	
						DB::table('user_roles')->insert($contact_user_roles); 
						
				  }   

                
				$data = [
				      'auth_first'=>Auth::user()->first_name,
					  'auth_last'=>Auth::user()->last_name,
					  'email'=>$contact->email,
				      'password'=>Input::get('password'),
					  'contact_first'=>$contact->first_name,
					  'contact_last'=>$contact->last_name
					];
				Mail::send('/users/contactmail', $data, function ($message) use($data)
				{
					$message->to($data['email'])->subject('SchedulingApp!');
					
				});	  


                /*
                       $data = file_get_contents('/home3/asquares/public_html/scheduling/resources/views/users/contactmail.blade.php');
		 $search = ['{{$auth_first}}','{{$auth_last}}','{{$email}}','{{$password}}','{{$contact_first}}', '{{$contact_last}}'];
		 $replace = [Auth::user()->first_name,Auth::user()->last_name,$contact->email,Input::get('password'),$contact->first_name,$contact->last_name ];
		 $message = str_replace($search, $replace, $data);
                 $to = $contact->email;  
				 $subject = 'schedulingapp';
                 $user_mail = new User;  
				 $mail = $user_mail->sendMail($to, $message, $subject);
                */				
				  
				                      			 
				  
				  return redirect('user/managecontacts/'.$id)->with('message', 'Contact added successfully');
			   }  
			   else{ 			      					
				   $roles = DB::table('roles')->where('company_id', '=', Auth::user()->company_id)->get();
			       $contact = new User;
				   return view('users.contact')->with(['roles'=>$roles, 'contact'=>$contact]);   
			   }
			   
		   }  
		   
		   
		   public function viewContacts(){ 
		   
		       $contacts = DB::table('users')->where('company_id', '=', Auth::user()->company_id)
			                                 ->where('user_type', '=', 'customer-contact')->get();  
			   return view('users.allcontacts')->with(['contacts'=>$contacts]);
		   }  
		   
		   public function editContact($id){
			      
				  $roles = DB::table('roles')->where('company_id', '=', Auth::user()->company_id)->get();
			      $contact =User::findOrFail($id);
			      $contact_id = $contact->id;		   
			      $contacts = User::findOrFail($id)
			                ->join('user_roles', function($join) use($id){
				                $join->on('users.id', '=', 'user_roles.user_id')
					              ->where('users.id', '=', $id);
			   })
			                ->join('roles', 'user_roles.role_id', '=', 'roles.roles_id')
			   
			                ->get();  
                  					  

                 foreach($contacts as $contact)
				 {
					 $contact = $contact;           				 
				 }		
				  
				  
				  
				  if(!empty(Input::get('first_name'))){
					 
					    $contact = User::findOrFail($id);
						$contact->first_name = Input::get('first_name');
						$contact->last_name =  Input::get('last_name');
						$contact->email =      Input::get('email');
						$contact->phone =      Input::get('phone');
						$contact->communication_preference = Input::get('comm_preference');
						$contact->notes =   Input::get('notes');
						$contact->password = Hash::make(Input::get('password'));
                        $contact->save();
                        return redirect('user/managecontacts/'.$contact->customer_contactId);      
					 
				  }  
				  else{
   			        return view('users.contact')->with(['roles'=>$roles, 'contact'=>$contact, 'contacts'=>$contacts]);  
				  }
			   
		   }  
		   
		   public function viewCustomerDevelopment(){  
		       $developments = new CustomerDevelopments;  
			   $dev =  $developments->getDevelopmentByCustomer();  
			
			   return view('users.customerdevelopments')->with(['dev'=>$dev]);
		   }  
		   
		   public function viewCustomerSiteLocation(){
			   $locations = DB::table('customer_site_locations')
                             ->join('customers', 'customer_site_locations.customer_id', '=', 'customers.id')
							 ->join('users', 'customer_site_locations.project_manager', '=', 'users.id')
							 
							 ->where('customers.created_by', '=', Auth::user()->id)
							 ->where('customers.company_id', '=', Auth::user()->company_id)  
							 ->join('customer_developments', 'customer_site_locations.subdivision', '=', 'customer_developments.development_id')
							 ->select('customers.first_name as customer_first','customers.last_name as customer_last',
							          'customers.company_name', 'customer_site_locations.location_id',
									  'customer_site_locations.location_title','customer_site_locations.street_address',
									  'users.first_name as user_first', 'users.last_name as user_last', 
									  'customer_site_locations.lot_number', 'customer_site_locations.subdivision', 'customer_developments.development_name')
							 ->get();                              							   
			   return view('users.customersitelocations')->with(['locations'=>$locations]);
		   }  
		   
		   public function addCustomerSiteLocation(){
			   if(!empty(Input::get('lot_number'))){
				   $site_location = new CustomerSiteLocations;
				   $site_location->lot_number = Input::get('lot_number');
				   $site_location->subdivision = Input::get('subdivision');
				   $site_location->street_address = Input::get('street_address');
				   $site_location->project_manager = Input::get('project_manager'); 
                   $site_location->customer_id = Input::get('customer');				   
				   $site_location->save();  
				   return redirect()->route('viewcustomersitelocations');
			   }
			   else{
			   $customers = DB::table('customers')
			                ->where('created_by','=', Auth::user()->id)
							->where('company_id', '=', Auth::user()->company_id)
							->get();
			   
			   $customer_location = new CustomerSiteLocations;    
			   $subdivisions = DB::table('customer_developments')->where('company_id', '=', Auth::user()->company_id)->get();
			   
			   return view('users.customersitelocation')->with(['customers'=>$customers, 'customer_location'=>$customer_location, 'subdivisions'=>$subdivisions]); 
			   }
		   } 
		   
		   public function viewCustomercontact($id){
			   $contacts = DB::table('users')->where('customer_contactId', '=', $id)->get();
               return json_encode($contacts);			   
			   
		   }  
		   
		   public function editCustomerSiteLocation($id){
			   if(!empty(Input::get('lot_number'))){
				      $updateLocation = CustomerSiteLocations::findOrFail($id);  
			          $updateLocation->lot_number = Input::get('lot_number');
			          $updateLocation->street_address =  Input::get('street_address');
					  $updateLocation->subdivision =  Input::get('subdivision');
                      $updateLocation->project_manager =  Input::get('project_manager');					  
					  $updateLocation->save();   
					  return redirect()->route('viewcustomersitelocations');
					  
			   }  
			   
			   else{
			   $locations  = new CustomerSiteLocations;  
			   $location = $locations->getLocationByCustomer($id);  
			
			   foreach($location as $customer_location){
				  $contacts = DB::table('users')
				              ->where('customer_contactId', '=', $customer_location->customer_id)
							  ->where('company_id', '=', $customer_location->company_id)
							  ->get();
			   }  	    
			   $customers = DB::table('customers')
			                ->where('created_by','=', Auth::user()->id)
							->where('company_id', '=', Auth::user()->company_id)
							->get();  
			  $subdivisions = DB::table('customer_developments')->where('company_id', '=', Auth::user()->company_id)->get();  
			   return view('users.customersitelocation')->with(['customer_location'=>$customer_location, 'customers'=>$customers, 'contacts'=>$contacts, 'subdivisions'=>$subdivisions]);  
			   }
		   }   
		   
		   public function addCustomerDevelopment(){  
		   
		        if(!empty(Input::get('development_name'))){
					  $development = new CustomerDevelopments;  
                      $development->development_name = Input::get('development_name');					  
					  $development->development_address = Input::get('development_address'); 					  
					  $development->project_manager = 	Input::get('project_manager');				  
					  $development->customer_id =  Input::get('customer');
                      
                      $development->company_id = Auth::user()->company_id;					  
                      $development->save();  
                      return redirect()->route('viewcustomerdevelopments');					  
				}  
				
				else{
					  $customer_location = new CustomerSiteLocations;
				$locations = $customer_location->getLocations();  
                $customers = new Customers;  
                $customer = $customers->getCustomers();	  
                $dev = new CustomerDevelopments;  
                //$project_manager = new std [{'id':'', 'first_name':'', 'last_name':''},{'id':'', 'first_name':'', 'last_name':''},]; 
                 				 
                			
				return view('users.customerdevelopment')->with(['locations'=>$locations, 'customer'=>$customer, 'dev'=>$dev]);
				}
				
		   }    
		   
		   
		   public function editCustomerDevelopment($id){
			     if(!empty(Input::get('development_name'))){
					   $development = CustomerDevelopments::findOrFail($id); 
					   $development->development_name = Input::get('development_name');
					   $development->development_address = Input::get('development_address');
					   $development->project_manager = Input::get('project_manager');
					    
					   $development->save();  
					   return redirect()->route('viewcustomerdevelopments');
				 }  
				 else{
					  $customers = new Customers;  
                 $customer = $customers->getCustomers();	  
                 $developments = new CustomerDevelopments;  
                 $development =$developments->getDevelopmentById($id);  
                 //dd($development);  
				 
				 foreach($development['development'] as $dev){
					 
					  
				  }  
                 foreach($development['locations'] as $locations){
					 
					  
				  }  
               
                 		   
				  
			   return view('users.customerdevelopment')->with(['customer'=>$customer, 'dev'=>$dev, 'locations'=>$development['locations'], 'project_manager'=>$development['project_managers'] ]);
				 }
                 
		   }
		   
		   
		   public function getCustomerDevelopmentLocation($id){
			   $locations = new CustomerSiteLocations;  
			   $location = $locations->getLocationByCustomer($id);   
			   
			   return json_encode($location);
		   }  
		   
		   
		   public function getCustomerLocation($id){
			   $locations = new CustomerSiteLocations;  
			   $location = $locations->getLocation($id);  
			   
			   return $location;
			   
		   }  
		   
		   public function getLocationId($id){
			   $location = DB::table('customer_site_locations')->where('location_id', '=', $id)->get();
			   return json_encode($location);
		   }  
		   
		   public function getProjectManagerByProject($id){
			   $project_manager = DB::table('customer_developments')->where('development_id', '=', $id)->get();  
			   return json_encode($project_manager);
		   }
		 
}
