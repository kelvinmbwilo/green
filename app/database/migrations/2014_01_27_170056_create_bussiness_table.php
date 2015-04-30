<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBussinessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bussiness', function(Blueprint $table)
		{
			$table->increments('id');
                                                $table->integer('apllicant_id');
                                                $table->string('start_year');
                                                $table->string('discr');
                                                $table->string('busness_location');
                                                $table->string('initial_captal');
                                                $table->string('current_captal');
                                                $table->integer('daily_turnover');
                                                $table->integer('monthly_turnover');
                                                $table->integer('business_expense');
                                                $table->integer('non_business_expense');
                                                $table->integer('user_id');
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
		Schema::drop('bussiness');
	}

}
