<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrantedLoansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('granted_loans', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('applicant_id');
            $table->integer('application_id');
            $table->integer('bussiness_id');
            $table->integer('interval');
            $table->string('interval_type');
            $table->integer('loan_amount');
            $table->integer('profit_percent');
            $table->integer('amount_to_return');
            $table->integer('amount_per_return');
            $table->integer('loan_actual_duration');
            $table->integer('loan_expected_duration');
            $table->date('start_date');
            $table->date('finish_date');
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
		Schema::drop('granted_loans');
	}

}
