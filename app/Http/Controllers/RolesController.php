<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Auth;
use DB;
use App\Roles; 
use App\Tasks; 
use App\RolesTasks; 
class RolesController extends Controller
{
    //
    private $tasks, $rolesTasksObj ;
    
    function __construct()
    {
        $this->rolesTasksObj=New RolesTasks;
        
        $taskObj=New Tasks;
        $this->tasks =$taskObj->getTasksByCompanyId();
    }
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
        
             return view('/users/role')->with(['data'=>$data, 'tasks'=>$this->tasks,'tasksMapped'=>array()]);
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
                 $tasksMapped=$this->rolesTasksObj->getTasksByRoleId($id);
                
                 return view('/users/role')->with(['data'=>$data, 'tasks'=>$this->tasks,'tasksMapped'=>$tasksMapped]);
            endif; 
        endif;

         
    }

    public function saveRole()
    {
          $rolesObj= new Roles;     

           
         if(!empty((Input::get('roles_id'))))
         {
               // $rolesObj->roles_id = Input::get('roles_id')
            
            /* Delete Old Roles Tasks Mapping */
            
                $id=Input::get('roles_id');
                $this->rolesTasksObj->deleteRoleTasksbyRoleId($id);

            /* Delete Old Roles Tasks Mapping */

            /* Insert Roles Tasks Mapping Again */
            $roletasks=Input::get('roletasks');
          
            if(count($roletasks))
            {
                    $this->rolesTasksObj->insertRolesTasksByRoleID($id,$roletasks);
            }
            
            /* Insert Roles Tasks Mapping Again */

            $rolesO = $rolesObj->getRoles(Input::get('roles_id'));
            $rolesO->role_title = Input::get('role_title');
            $rolesO->role_notes = Input::get('role_notes');   
            if(Input::get('communication') != ''){
				    $rolesO->communication = Input::get('communication');
			     }	
              else{
				  $rolesO->communication = 0;
			  }				 
			
			
            $rolesO->save();
         
         }
         else
         {
               
               
               $rolesObj->role_title = Input::get('role_title');
               $rolesObj->role_notes = Input::get('role_notes');
               $rolesObj->company_id = Auth::user()->company_id;  
			     
			   if(Input::get('communication') != ''){
				    $rolesObj->communication = Input::get('communication');
			     }  
			   $rolesObj->save();    

                /* Insert Roles Tasks Mapping Again */
                $roletasks=Input::get('roletasks');
                if(count($roletasks))
                  {
                     $this->rolesTasksObj->insertRolesTasksByRoleID($rolesObj->roles_id,$roletasks);
                  }
                    
                    /* Insert Roles Tasks Mapping Again */

         }
         
    }

    public function deleteRole($roleID)
    {
        if(!empty($roleID))
        {
            $rolesObj= new Roles;  
            if($rolesObj->deleteRole($roleId)) // returns true only if user has permission to delete and deletes
            {
                 $this->rolesTasksObj->deleteRoleTasksbyRoleId($roleID); // Delete Role Tasks only if role is deleted
            }

           
        }

    }
}
