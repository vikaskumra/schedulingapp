<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;  

class Company extends Model
{
    public function users()
	{
		 return $this->hasMany('App\User');
		 
	}  
	

	public function getClients($company_id = '')
	{
		 $value = 'owner';
		     /*$clients = Company::with('users')->whereHas('users', function($q) use($value){
				 $q->where('user_type', '=', $value);
	 	 	  })->get();  
			 */
			 if(!empty($company_id)){
				 $clients=DB::table('companies')
         	  ->join('users', 'companies.id', '=', 'users.company_id')
			 ->where('users.user_type','=',$value)
			 ->where('users.company_id', '=', $company_id)
			 ->select('companies.*','users.first_name','users.last_name','users.email', 'users.user_type', 'users.company_id')
			 ->get();   
			 }
			 else{
				 $clients=DB::table('companies')
         	  ->join('users', 'companies.id', '=', 'users.company_id')
			 ->where('users.user_type','=',$value)
			 ->get();   
			 }
			  
			// dd($clients);
			// exit;
			 
			 	return $clients;
	}

/*	public function CompanyTypes()
	{
		 return $this->belongsTo('App\CompanyTypes','company_type','id');
	}
*/
}
