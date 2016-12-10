<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;  
use App\Roles;
use App\Jobs;   
use App\User;  
use Illuminate\Support\Facades\Input;  
use Illuminate\Support\Facades\Auth;  
use DB;

class JobsController extends Controller
{
    public function displayJobs(){
			 return view('users.jobs');
		 }  
		 
		 public function addJob(){  

             $tasktypes = DB::table('tasktypes')->where('company_id', '=', Auth::user()->company_id)->get();
			 $roles = DB::table('roles')->where('company_id', '=', Auth::user()->company_id)->get();		 
		     if(!empty(Input::get('task_title'))){
				 
				 $job = new Jobs; 
				 $job->job_title = Input::get('job_title'); 
				 $job->job_description = Input::get('description');
				 $job->company_id = Auth::user()->company_id;
				 $job->user_id = Auth::user()->id;  
				 $job->save();
				 
				 $job_id = $job->id;
                 $task_title = Input::get('task_title');
				 $task_note = Input::get('task_notes');
                 $task_type = Input::get('task_type');
                 $role = Input::get('role');
                 $user = Input::get('user');  
				 
				 
                        //var_dump($new_job);				 
					 $finaldata=array(); 
                     foreach($task_title as $key=>$value){
						$finaldata[]=array(
						'job_id' => $job_id ,
						'task_title' => $task_title[$key],
						'task_notes' => $task_note[$key],
						'tasktype_id' => $task_type[$key],
						'role_id' => $role[$key] ,
						'user_id' => $user[$key] 
						);
						 
					 }
					
					
				 
               
			 
			  				  
				   
				
				 
				 DB::table('job_tasks')->insert($finaldata);   
				 return redirect('user/setupjobs');
				 
				 
				 
			 }  
			 else{
			 
			 return view('users.job')->with(['tasktypes'=>$tasktypes, 'roles'=>$roles]);  
			 }
		 } 
}
