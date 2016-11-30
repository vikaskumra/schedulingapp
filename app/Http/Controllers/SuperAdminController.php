<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Auth;
use App\CompanyTypes;
use App\Company;  
use App\User;  
use Hash;  
use DB;

class SuperAdminController extends Controller
{
    //
	private function constructor()
	{
	
	}
	
	public function dashboard()
	{
		  if(!Auth::check()){
	    	
			return redirect('/superadmin/login');
		  }
		  
		  else{
			  return view('/superadmin/dashboard');
		  }
	}
	
	public function listCompanyTypes()
	{
		$companytypes=CompanyTypes::all();
		
		return view('/superadmin/companytypes')->with(['companytypes'=>$companytypes]);
	}
	
	public function manageCompanyType($id="")
	{
		//$data=array();
		
		if(!empty($id))
		{
			  $data=CompanyTypes::findOrFail($id);
			//echo $id;
				
			   
				if(!empty(Input::get('id'))):
					 $data->company_type=Input::get('company_type');
					$data->type_note=Input::get('type_note');
					$data->id=Input::get('id');
					$data->save();
					return redirect('superadmin/companytypes');
				else:
					
					return view('/superadmin/managecompanytype')->with(['data'=>$data]);
				endif;
		}
		else
		{
					
			
			
			  
			   $data=new CompanyTypes;
			   $data->id='';
			   $data->company_type='';
			   $data->type_note='';
				
				
			   $type=new CompanyTypes;
			   $type->company_type=Input::get('company_type');
			   $type->type_note=Input::get('type_note');
				if(!empty($type->company_type)):
				$type->save();
				return redirect('superadmin/companytypes');
				else:
				return view('/superadmin/managecompanytype')->with(['data'=>$data]);
				endif;
			//return view('/superadmin/companytypes');
		}
	}  
	
	
	
	   public function removeCompanyType($id){
		   $type = CompanyTypes::findOrFail($id); 
		   $type->delete();
		   return redirect('/superadmin/companytypes');
	   }  
	   
	   
	   public function listClients(){  
	   
	         $value = 'owner';
		     $clients = Company::with('users')->whereHas('users', function($q) use($value){
				 $q->where('user_type', '=', $value);
				 
			 })->get();  
			 //print_r($clients);
			 //exit;
			 return view('/superadmin/clients')->with(['clients'=>$clients]);
	   }  
	   
	   public function manageClients(){ 
            $company = new Company;
             $company->id = '';				 
	       $companytypes=CompanyTypes::all();  		   
				return view('/superadmin/manageclients')->with(['companytypes'=>$companytypes, 'company'=>$company]);  
		   
	   }  
	   
	   public function addClients($id=""){			   
			 if(!empty($id)){
                   		 
				    $company = Company::findOrFail($id);
				   $companytypes=CompanyTypes::all();
				   return view('/superadmin/manageclients')
				   ->with(['companytypes'=>$companytypes, 'company'=>$company]);   
                  $company->company_name = Input::get('company_name'); 
                  $company->company_type = Input::get('company_type');
                  $company->address =      Input::get('address');
                  $company->city =         Input::get('city');
                  $company->state =        Input::get('state');
                  $company->country =      Input::get('country');
                 echo  $company->phone = 	   Input::get('phone'); 
                 echo $company->first_name =   Input::get('first_name');				  
					
				   
			 }
			 else{			 
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
			return view('/superadmin/clients');  
			 }
	   }
	
	
	
	
}
