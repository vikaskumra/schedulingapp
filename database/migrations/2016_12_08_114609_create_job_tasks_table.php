<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_tasks', function(Blueprint $table){
			     $table->increments('id');
				 $table->string('job_id');
				 $table->string('task_title');
				 $table->string('task_notes');
				 $table->string('tasktype_id');
				 $table->string('role_id');
				 $table->string('user_id');
				 $table->string('task_status');
				 $table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('job_tasks');
    }
}
