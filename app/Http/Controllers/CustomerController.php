<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests; 
use App\Customers;
use App\User; 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use DB; 
use Hash;

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
		 
}
