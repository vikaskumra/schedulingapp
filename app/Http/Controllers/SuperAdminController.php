<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

use App\CompanyTypes;

class SuperAdminController extends Controller
{
    //
	private function constructor()
	{
	
	}
	
	public function dashboard()
	{
		return view('/superadmin/dashboard');
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
	
	
	
}
