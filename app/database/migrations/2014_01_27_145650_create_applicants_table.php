<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applicants', function(Blueprint $table)
		{
			$table->increments('id');
                                                $table->string('firstname');
                                                $table->string('middlename');
                                                $table->string('lastname');
                                                $table->string('gender');
                                                $table->date('bitrhdate');
                                                $table->string('phone');
                                                $table->string('postal_address');
                                                $table->string('marital_status');
                                                $table->integer('family_size');
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
		Schema::drop('applicants');
	}

}
