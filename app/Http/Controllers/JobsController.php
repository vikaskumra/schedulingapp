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
	
	         $jobs = Jobs::all();
			 return view('users.jobs')->with(['jobs'=>$jobs]);
		 }  
		 
		 public function addJob(){  

             $tasktypes = DB::table('tasktypes')->where('company_id', '=', Auth::user()->company_id)->get();
			 $roles = DB::table('roles')->where('company_id', '=', Auth::user()->company_id)->get();		 
		     $tasks = DB::table('tasks')->where('company_id','=', Auth::user()->company_id)->get();
			 $phases = DB::table('task_states')->get();
			 if(!empty(Input::get('task_title'))){
				 
				 $job = new Jobs; 
				 $job->job_title = Input::get('job_title'); 
				 $job->job_description = Input::get('description');
				 $job->company_id = Auth::user()->company_id;
				 $job->user_id = Auth::user()->id;  
				 $job->save();
				 
				 $job_id = $job->id;
                 $task_id = Input::get('task_title');
				 $job_phase = Input::get('job_phase');
             
                 $role = Input::get('role');
                 $user = Input::get('user');  
				 
				 
                        //var_dump($new_job);				 
					 $finaldata=array(); 
                     foreach($task_id as $key=>$value){
						$finaldata[]=array(
						'job_id' => $job_id ,
						'task_id' => $task_id[$key],
						'job_phase_id'=>$job_phase[$key],
						
						'role_id' => $role[$key] ,
						'user_id' => $user[$key] 
						);
						 
					 }
					
					
				 
               
			 
			  				  
				   
				
				 
				 DB::table('job_tasks')->insert($finaldata);   
				 return redirect('user/setupjobs');
				 
				 
				 
			 }  
			 else{
			 
			    return view('users.job')->with(['tasktypes'=>$tasktypes, 'roles'=>$roles, 'tasks'=>$tasks, 'phases'=>$phases]);  
			 }
		 }  

          public function editJob($id){
			  $jobs =   DB::table('jobs')
			         ->join('job_tasks', 'jobs.id', '=', 'job_tasks.job_id')
                     ->join('roles_tasks', 'job_tasks.task_id', '=', 'roles_tasks.task_id')
                     ->join('user_roles', 'roles_tasks.role_id', '=', 'user_roles.role_id')  
                     ->join('users', 'user_roles.user_id', '=', 'users.id')				 
					 ->where('jobs.id', '=', $id) 
					 ->select('jobs.*', 'job_tasks.job_id', 'job_tasks.task_id', 'job_tasks.job_phase_id', 
					           'users.first_name', 'users.last_name', 'user_roles.role_id', 'user_roles.user_id')
					  ->get();    
					  
					  
                foreach($jobs as $job){
					
				}					  
          
			  $tasks = DB::table('tasks')->where('company_id','=', Auth::user()->company_id)->get();		  
			  $phases = DB::table('task_states')->get();
			  return view('users.job')->with(['job'=>$job, 'tasks'=>$tasks, 'phases'=>$phases, 'jobs'=>$jobs]);
		  }
		 
}
