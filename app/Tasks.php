<?php

namespace App;
use DB;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    //
    
    protected $table='tasks';
    protected $primaryKey='task_id';
    function getTasks($taskid='')
    {
        if(!empty($taskid))
        {
               
             return Tasks::findOrFail($taskid);
        }
        else
        {
            return DB::table('tasks')->join('tasktypes',  'tasks.task_type','=','tasktypes.tasktypes_id')->get();

        }
        
    }
    function getTasksByCompanyId($taskid='')
    {
        $companyid=Auth::user()->company_id;
        if(!empty($taskid))
        {
               
           //  return Tasks::findOrFail($taskid);
            return DB::table('tasks')
            ->where('task_id','=',$taskid)
            ->where('tasks.company_id','=', $companyid)
            ->join('tasktypes',  'tasks.task_type','=','tasktypes.tasktypes_id')->get();
        }
        else
        {
           // return DB::table('tasks')->join('tasktypes',  'tasks.task_type','=','tasktypes.tasktypes_id')->get();
            return DB::table('tasks')
          //  ->where('task_id','=',$taskid)
            ->where('tasks.company_id','=', $companyid)
            ->join('tasktypes',  'tasks.task_type','=','tasktypes.tasktypes_id')->get(); 
        }
        
    }  
	
	
	public function getUserByTaskId($id){
		$tasks = DB::table('tasks')->where('tasks.task_id', '=', $id)
		            ->join('roles_tasks', 'tasks.task_id', '=', 'roles_tasks.task_id')
					->join('user_roles', 'roles_tasks.role_id', '=', 'user_roles.role_id')
					->join('users', 'user_roles.user_id', '=', 'users.id')
					->select('users.id', 'users.first_name', 'users.last_name')->get();   
        return $tasks;		
	}

  
    
}
