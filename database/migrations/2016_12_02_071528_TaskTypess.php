<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaskTypess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('tasktypes', function(Blueprint $table){
			$table->increments('tasktypes_id');
			$table->string('tasktype_title');
            $table->integer('company_id');
			$table->string('comments');
			
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
        Schema::drop('tasktypes');
    }
}
