<?php

namespace App; 
use DB;

use Illuminate\Database\Eloquent\Model;

class CustomerSiteLocations extends Model
{
    protected $table = 'customer_site_locations';
	protected $primaryKey = 'location_id';  
	
	public function getLocationByCustomer($id){
		$location = DB::table('customer_site_locations')
		            ->join('customers', 'customer_site_locations.customer_id', '=', 'customers.id')
					->join('users', 'customer_site_locations.project_manager', '=', 'users.id')
					->where('customer_site_locations.location_id', '=', $id) 
					->select('customers.first_name as customer_first','customers.last_name as customer_last',
							          'customers.company_name', 'customer_site_locations.location_id',
									  'customer_site_locations.location_title','customer_site_locations.street_address',
									  'users.first_name as user_first', 'users.last_name as user_last',
									  'customer_site_locations.customer_id', 'customers.company_id',
									  'customer_site_locations.project_manager', 'users.id as user_id',
									  'customer_site_locations.lot_number', 'customer_site_locations.subdivision')
					->get();  
		return $location;
		//var_dump($location);
	}  
	
	public function getLocations(){
		$locations = DB::table('customer_site_locations')
		             ->join('customers', 'customer_site_locations.customer_id','=', 'customers.id')  
					 ->join('users','customer_site_locations.project_manager', '=', 'users.id')  
					 ->select('customer_site_locations.*', 'users.first_name', 'users.last_name', 'users.id')
					 ->get();  
		return $locations;
	}  


    public function getLocation($id=''){
		if(!empty($id)){
			  
			  		$location = DB::table('customer_site_locations')
		->where('customer_id', '=', $id)
		->get();      
		foreach($location as $locations){
			
		}  
		$project_manager = DB::table('users')->where('customer_contactId', '=', $locations->customer_id)->get();
		$manager = json_encode($project_manager);  
        $data = ['location'=>$location, 'project_manager'=>$project_manager];  
		return json_encode($data);
		}  
		
		else{
			return false;
		}

	}	
	
	
	
}
