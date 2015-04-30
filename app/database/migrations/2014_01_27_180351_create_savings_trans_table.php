<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavingsTransTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('savings_trans', function(Blueprint $table)
		{
			$table->increments('id');
                                                $table->integer('applicant_id');
                                                $table->integer('saving_id');
                                                $table->integer('amount');
                                                $table->string('action');
                                                $table->date('date');
                                                $table->integer('balance_before');
                                                $table->integer('balance_after');
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
		Schema::drop('savings_trans');
	}

}
