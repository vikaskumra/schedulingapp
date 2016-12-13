<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Customers extends Model
{
    public function getCustomers(){
		$customer = DB::table('customers')->get();  
		return $customer;
	}  
	
	
}
