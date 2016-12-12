<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerDevelopmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_developments', function(Blueprint $table){
			       $table->increments('development_id');
				   $table->string('development_name');
				   $table->string('development_address');
				   $table->string('project_manager');
				   $table->string('customer_id');
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
        Schema::drop('customer_developments'); 
    }
}
