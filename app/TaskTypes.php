<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class TaskTypes extends Model
{
    //
    protected $table = 'tasktypes';
    protected $primaryKey = 'tasktypes_id';
    function getTaskTypes($taskid='')
    {
        if(!empty($taskid))
        {
               
             return TaskTypes::findOrFail($taskid);
        }
        else
        {
            return DB::table('tasktypes')->get();

        }
        
    }

   
}
