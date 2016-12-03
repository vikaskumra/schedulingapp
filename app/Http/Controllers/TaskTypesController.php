<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Auth;
use DB;
use App\TaskTypes; 

class TaskTypesController extends Controller
{
    //
    public function index()
    {
      //echo 'list tasks grid here...';
        $tasksObj = new TaskTypes;
         $tasks=$tasksObj->getTaskTypes();
        //return view('/superadmin/companytypes')->with(['companytypes'=>$companytypes]);
        return view('/users/tasktypes')->with(['taskstypes'=>$tasks]);
    }

    public function addtasktype()
    {
        
        if(!empty(Input::get('tasktype_title'))):
           $this->saveTaskType();
           return redirect()->route('setuptasktypes');
        else:
             $data=new TaskTypes;
        
             return view('/users/tasktype')->with(['data'=>$data]);
        endif;     
    }

    public function edittasktype($id='')
    {
        $tasktypesObj= new TaskTypes; 
        if(empty($id)):
          return redirect()->route('userdashboard');
        else:
            if(!empty(Input::get('tasktype_title'))):
                $this->saveTaskType();
                return redirect()->route('setuptasktypes');
            else: 
                 $data = $tasktypesObj->getTaskTypes($id);
                 
                 return view('/users/tasktype')->with(['data'=>$data]);
            endif; 
        endif; 
    }

    public function saveTaskType()
    {
          $tasktypesObj= new TaskTypes;       
         if(!empty((Input::get('tasktypes_id'))))
         {
               // $rolesObj->roles_id = Input::get('roles_id')
              
            $tasktypesO = $tasktypesObj->getTaskTypes(Input::get('tasktypes_id'));
            $tasktypesO->tasktype_title = Input::get('tasktype_title');
            $tasktypesO->comments = Input::get('comments');
            $tasktypesO->save();
         
         }
         else
         {
               
               
               $tasktypesObj->tasktype_title = Input::get('tasktype_title');
               $tasktypesObj->comments = Input::get('comments');
               $tasktypesObj->company_id = Auth::user()->company_id;
               $tasktypesObj->save();    
         }
         
    }
}
