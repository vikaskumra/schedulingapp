<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class RolesTasks extends Model
{
    //
    protected $table = 'roles_tasks';
    protected $primaryKey = 'role_task_id';
    
    public function getTasksByRoleId($roleId)
    {
       $RoleTasks=DB::table('roles_tasks')->select('task_id')->where('role_id','=',$roleId)->get();
       $taskIds=array();
       foreach($RoleTasks as $role)
       {
           $taskIds[]= $role->task_id;
       }
       return $taskIds;
    }
    public function deleteRoleTasksbyRoleId($roleid)
    {
        DB::table('roles_tasks')->where('role_id','=',$roleid)->delete();
    }
    public function insertRolesTasksByRoleID($roleid,$tasks)
    {
            $inserData=array();
            foreach($tasks as $taskid)
            {
                    $inserData[]=array('role_id'=> $roleid, 'task_id'=>$taskid);
            }
            if(count($inserData))
            {
                DB::table('roles_tasks')->insert($inserData);
            }
    }
}
