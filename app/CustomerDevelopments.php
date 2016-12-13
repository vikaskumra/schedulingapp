<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class CustomerDevelopments extends Model
{
    protected $table = 'customer_developments'; 
	protected $primaryKey = 'development_id';  
	
	public function getDevelopmentByCustomer(){
		$developments = DB::table('customer_developments')
		                ->join('users', 'customer_developments.project_manager', '=', 'users.id')
						->join('customers', 'customer_developments.customer_id', '=', 'customers.id')
						->select('customer_developments.development_id','customer_developments.development_name',
						         'customer_developments.development_address','customers.company_name',
								 'customers.first_name as company_first', 'customers.last_name as customer_last',
								 'users.id as user_id', 'users.first_name as user_first','users.last_name as user_last')
						->get();  
		return $developments;
	}  
	
	public function getDevelopmentById($id=''){
		if(!empty($id)){
			$development = DB::table('customer_developments')
			               ->where('development_id', '=', $id)
						   ->get();  
             foreach($development as $dev)						   
            $locations = DB::table('customer_site_locations')->where('customer_id', '=', $dev->customer_id)->get();  
            $data = ['development'=>$development, 'locations'=>$locations];			
			return($data);
		}  
		
		else{
			
		}
	}
}
