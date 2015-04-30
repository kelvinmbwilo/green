<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeStatementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('income_statement', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer("applicant_id");
            $table->integer("parameter_id");
            $table->integer("net_sales");
            $table->integer("cost_of_goods");
            $table->integer("sales_admin_expense");
            $table->integer("other_operating");
            $table->integer("deprecation_amount");
            $table->integer("non_operating");
            $table->integer("gross_interest");
            $table->integer("income_tax");
            $table->integer("minority_expense");
            $table->integer("equity_earning");
            $table->integer("special_income");
            $table->string("year");
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
		Schema::drop('income_statement');
	}

}
