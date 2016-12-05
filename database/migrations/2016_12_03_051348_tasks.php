<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
           Schema::create('tasks', function(Blueprint $table){
			$table->increments('task_id');
			$table->string('task_title');
            $table->string('task_type');
            $table->integer('company_id');
			$table->string('task_comments');
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
        //
         Schema::drop('tasks');
    }
}
