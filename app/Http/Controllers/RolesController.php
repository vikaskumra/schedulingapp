<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Auth;
use DB;
use App\Roles; 
class RolesController extends Controller
{
    //
    public function index()
    {
        
        $rolesObj= new Roles;
        $roles=$rolesObj->getRoles();
        //return view('/superadmin/companytypes')->with(['companytypes'=>$companytypes]);
        return view('/users/roles')->with(['roles'=>$roles]);
        
    }

    public function addrole()
    {
        
        if(!empty(Input::get('role_title'))):
           $this->saveRole();
           return redirect()->route('setuproles');
        else:
        $data=new Roles;
        
             return view('/users/role')->with(['data'=>$data]);
        endif;     
    }

    public function editrole($id='')
    {
        $rolesObj= new Roles; 
        if(empty($id)):
          return redirect()->route('userdashboard');
        else:
            if(!empty(Input::get('role_title'))):
                $this->saveRole();
                return redirect()->route('setuproles');
            else: 
                 $data = $rolesObj->getRoles($id);
                
                 return view('/users/role')->with(['data'=>$data]);
            endif; 
        endif; 
    }

    public function saveRole()
    {
          $rolesObj= new Roles;       
         if(!empty((Input::get('roles_id'))))
         {
               // $rolesObj->roles_id = Input::get('roles_id')
              
            $rolesO = $rolesObj->getRoles(Input::get('roles_id'));
            $rolesO->role_title = Input::get('role_title');
            $rolesO->role_notes = Input::get('role_notes');
            $rolesO->save();
         
         }
         else
         {
               
               
               $rolesObj->role_title = Input::get('role_title');
               $rolesObj->role_notes = Input::get('role_notes');
               $rolesObj->company_id = Auth::user()->company_id;
               $rolesObj->save();    
         }
         
    }
}
