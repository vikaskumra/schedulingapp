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

	public function getClients()
	{
		 $value = 'owner';
		     /*$clients = Company::with('users')->whereHas('users', function($q) use($value){
				 $q->where('user_type', '=', $value);
	 	 	  })->get();  
			 */
			 $clients=DB::table('companies')
         	  ->join('users', 'companies.id', '=', 'users.company_id')
			 ->where('users.user_type','=',$value)
			 ->get();    
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
