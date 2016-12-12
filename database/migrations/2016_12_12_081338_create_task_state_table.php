<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_states', function(Blueprint $table){
			  $table->increments('task_state_id');
			  $table->string('task_state_name');
			  $table->string('task_state_color');
			  $table->string('task_state_note');
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
        Schema::drop('task_states');
    }
}
