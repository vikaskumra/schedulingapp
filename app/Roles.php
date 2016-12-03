<?php

namespace App;
use DB;  
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $primaryKey = 'roles_id';
    function getRoles($roleid='')
    {
        if(!empty($roleid))
        {
               
             return Roles::findOrFail($roleid);
        }
        else
        {
            return DB::table('roles')->get();

        }
        
    }
}
