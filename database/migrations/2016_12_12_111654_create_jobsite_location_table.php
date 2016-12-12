<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsiteLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_site_locations', function(Blueprint $table){
			   $table->increments('location_id');
			   $table->string('location_title');
			   $table->string('street_address');
			   $table->string('project_manager');
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
       Schema::drop('customer_site_locations');
    }
}
