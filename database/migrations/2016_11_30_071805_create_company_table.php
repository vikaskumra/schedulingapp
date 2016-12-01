<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function(Blueprint $table){
			$table->increments('id');
			$table->string('company_name');
			$table->string('company_type');
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->string('country');
			$table->string('phone');
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
        Schema::drop('companies');
    }
}
