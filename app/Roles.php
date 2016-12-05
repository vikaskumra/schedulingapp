<?php

namespace App;
use DB;  
use Illuminate\Database\Eloquent\Model;  
use Auth;

class Roles extends Model
{
    //
    protected $primaryKey = 'roles_id';
    function getRoles($roleid='')
    {  
<<<<<<< HEAD
            if(Auth::user()->user_type == 'superadmin'){
            if(!empty($roleid))
                {
                    
                    return Roles::findOrFail($roleid);
                }
                else
                {
                    return DB::table('roles')->get();

                }
            
            }  
            
            else{
            
            if(!empty($roleid))
                {
                    
                    return Roles::where('company_id', '=', Auth::user()->company_id)->findOrFail($roleid);
                }
                else
                {
                    return DB::table('roles')->where('company_id', '=', Auth::user()->company_id)->get();

                }
            
            
            }
                
                
    }

    function deleteRole($roleId)
    {
       // DB::table('roles')->where('')
=======
	  if(Auth::user()->user_type == 'superadmin'){
		if(!empty($roleid))
        {
               
              return Roles::findOrFail($roleid);
        }
        else
        {
              return DB::table('roles')->get();

        }
			 
	   }  
	   
	   else{
		     
			 if(!empty($roleid))
        {
               
             return Roles::where('company_id', '=', Auth::user()->company_id)->findOrFail($roleid);
        }
        else
        {
            return DB::table('roles')->where('company_id', '=', Auth::user()->company_id)->get();

        }
			 
			 
	   }
        
        
>>>>>>> 7066d08ded9280414095c13444ddf9310c4a813f
    }
}