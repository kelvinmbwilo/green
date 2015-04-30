<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('returns', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('applicant_id');
            $table->integer('application_id');
            $table->integer('bussiness_id');
            $table->integer('granted_id');
            $table->integer('amount');
            $table->date('return_date');
            $table->string('comments');
            $table->integer("balance");
            $table->integer("remaining");
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
		Schema::drop('returns');
	}

}
