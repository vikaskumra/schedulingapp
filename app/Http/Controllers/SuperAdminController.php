<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Auth;
use App\CompanyTypes;
use App\Company;  
use App\User;  
use App\Trades;  
use Hash;  
use DB;  
use Validator;

class SuperAdminController extends Controller
{
    //
	private function constructor()
	{
	
	}
	
	public function dashboard()
	{
		  if(!Auth::check()){
	    	
			return redirect()->route('login');
		  }
		  
		  else{
			  return view('/superadmin/dashboard');
		  }
	}
	
	public function listCompanyTypes()
	{
		$trades=Trades::all();
		
		return view('/superadmin/companytypes')->with(['trades'=>$trades]);
	}
	
	public function manageCompanyType($id="")
	{
		//$data=array();
		
		if(!empty($id))
		{
			  
			  $data=Trades::findOrFail($id);
			//echo $id;
				 
			   
				if(!empty(Input::get('id'))):
					$data->trade_title=Input::get('trade_title');
					$data->trade_notes=Input::get('trade_notes');
					//$data->id=Input::get('id');
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
			   $type=new Trades;
			   $type->trade_title=Input::get('trade_title');
			   $type->trade_notes=Input::get('trade_notes');
				if(!empty($type->trade_title)):
				$type->save();
				return redirect('superadmin/companytypes');
				else:
				return view('/superadmin/managecompanytype')->with(['data'=>$data]);
				endif;
			//return view('/superadmin/companytypes');
		}
	}  
	
	
	
	   public function removeCompanyType($id){
		   $type = Trades::findOrFail($id); 
		   $type->delete();
		   return redirect('/superadmin/companytypes');
	   }  
	   
	   
	   public function listClients(){  
		   
		   $company= new Company;
	        $clients=$company->getClients();      			
			 return view('/superadmin/clients')->with(['clients'=>$clients]);
	   }  
	   
	   public function manageClients(){ 
            $company = new Company;
             $company->id = '';				 
	       $trades=Trades::all();  		   
				return view('/superadmin/manageclients')->with(['trades'=>$trades, 'company'=>$company]);  
		   
	   }  
	   
	   public function addClients($id=''){

			   
			 if(!empty($id)){
                   		 
				   $company = Company::findOrFail($id);
				   $companytypes=CompanyTypes::all();  
				   if(!empty(Input::get('id'))){  
				   //echo ($company->id); 
				   
				   
				  $company->company_name = Input::get('company_name'); 
                  $company->company_type = Input::get('company_type');
                  $company->address =      Input::get('address');
                  $company->city =         Input::get('city');
                  $company->state =        Input::get('state');
                  $company->country =      Input::get('country');
                  $company->phone = 	   Input::get('phone');	 
                  foreach($company->users as $user)
				   {
				  $user->first_name =   Input::get('first_name');  
                  $user->last_name =    Input::get('last_name');
                  $user->email =        Input::get('email');  
				  if(!Input::get('password') == ''){
					  $user->password =     Hash::make(Input::get('password'));
				  }
                  
				  $user->save();
				   }  
                   $trade_id = Input::get('company_trade');  
                   DB::table('company_trades')->where('company_id', '=', $id)->delete();				   
                   
				  $company->save(); 
                      $trade_data = [];				  
				     foreach($trade_id as $trade){
						 $trade_data[] = ['trade_id'=>$trade, 'company_id'=>$id];
					 }  
					 
					 DB::table('company_trades')->insert($trade_data);
				     
				  return redirect('/superadmin/clients');
                                
				  }  

                       else{
						   $trades=Trades::all();	
						   $companytrades= DB::table('company_trades')->where('company_id', '=' ,$id)->get();
						   $company_trades=array();
						   foreach($companytrades as $key=>$value)
						   {
							   $company_trades[]=$value->trade_id;
						   }	
						return view('/superadmin/manageclients')
				           ->with(['companytypes'=>$companytypes, 'company'=>$company, 'trades'=>$trades, 'company_trades'=>$company_trades]);
					   }				   
		
				   
			 }
			 else
			 {
   
				$rules = ['password'=>'required|same:confpass'];
				$validation = Validator::make(Input::all(), $rules);
				if($validation->fails())
				{
						return redirect('/superadmin/manageclients')->withErrors($validation)->withInput();
				}	   
		
				else
				{	   
					$company = new Company;
					$company->company_name = Input::get('company_name'); 
					$company->address =      Input::get('address');
					$company->city =         Input::get('city');
					$company->state =        Input::get('state');
					$company->country =      Input::get('country');
					$company->Phone =		 Input::get('phone');   
					$company->save();
					$user = new User;
					$user->first_name =     Input::get('first_name');
					$user->last_name =      Input::get('last_name');
					$user->company_id =     $company->id;
					$user->email =          Input::get('email');
					$user->password = Hash::make(Input::get('password'));
					$user->save();     
                    $trades = Input::get('company_trade');
					$trade_data = [];
					foreach($trades as $trade){
						$trade_data[] = ['trade_id'=>$trade, 'company_id'=>$company->id]; 
					}
					
					
					
                    DB::table('company_trades')->insert($trade_data);					
					return redirect('/superadmin/clients');  
				}
		 }
	   }  
	   
	   
	   public function deleteClients($id){
		   $clients = Company::findOrFail($id);  
		   foreach($clients->users as $user)
		   {
			   $user->delete();
		   }  
		   $clients->delete();  
            return redirect('/superadmin/clients');
	   }
	
	
	
	
}
