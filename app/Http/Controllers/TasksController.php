<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Auth;
use DB;
use App\Tasks; 
use App\TaskTypes; 

class TasksController extends Controller
{
    //
    public function index()
    {
      //echo 'list tasks grid here...';
         $tasksObj = new Tasks;
         $tasks=$tasksObj->getTasksByCompanyId();
        
       
        //return view('/superadmin/companytypes')->with(['companytypes'=>$companytypes]);
        return view('/users/tasks')->with(['tasks'=>$tasks]);
    }

    public function addtask()
    {
        $taskTypes=new TaskTypes;
        $tasktypes=$taskTypes->get();

        if(!empty(Input::get('task_title'))):
           $this->saveTask();
           return redirect()->route('setuptasks');
        else:
             $data=new Tasks;
        
             return view('/users/task')->with(['data'=>$data,'tasktypes'=>$tasktypes]);
        endif;     
    }

    public function edittask($id='')
    {
          $taskTypes=new TaskTypes;
         $tasktypes=$taskTypes->get();
        
        $taskObj= new Tasks; 
        if(empty($id)):
          return redirect()->route('userdashboard');
        else:
            if(!empty(Input::get('task_title'))):
                $this->saveTask();
                return redirect()->route('setuptasks');
            else: 
                 $data = $taskObj->getTasks($id);
                 
                 return view('/users/task')->with(['data'=>$data,'tasktypes'=>$tasktypes]);
            endif; 
        endif; 
    }

    public function saveTask()
    {
          $taskObj= new Tasks;       
         if(!empty((Input::get('task_id'))))
         {
               // $rolesObj->roles_id = Input::get('roles_id')
              
            $taskO = $taskObj->getTasks(Input::get('task_id'));
            $taskO->task_title = Input::get('task_title');
            $taskO->task_type = Input::get('task_type');
            $taskO->task_comments = Input::get('task_comments');
            $taskO->save();
         
         }
         else
         {
               
               
               $taskObj->task_title = Input::get('task_title');
               $taskObj->task_type = Input::get('task_type');
               $taskObj->task_comments = Input::get('task_comments');
               $taskObj->company_id = Auth::user()->company_id;
               $taskObj->save();    
         }
         
    }


       

}
