<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applications', function(Blueprint $table)
		{
			$table->increments('id');
                                                $table->integer('applicant_id');
                                                $table->integer('bussiness_id');
                                                $table->integer('applied_amount');
                                                $table->integer('amount_granted');
                                                $table->string('status');
                                                $table->text('comments');
                                                $table->text('collateral');
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
		Schema::drop('applications');
	}

}
