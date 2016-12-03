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
			 ->join('company_types', 'companies.company_type', '=', 'company_types.id')
			 ->join('users', 'companies.id', '=', 'users.company_id')
			 ->select('companies.id',
			 		 'companies.company_name', 
					  'company_types.company_type',
					  'users.first_name',
					  'users.last_name',
					  'users.email')

			 ->where('users.user_type','=',$value)
			 ->get();
			 	return $clients;
	}

/*	public function CompanyTypes()
	{
		 return $this->belongsTo('App\CompanyTypes','company_type','id');
	}
*/
}
