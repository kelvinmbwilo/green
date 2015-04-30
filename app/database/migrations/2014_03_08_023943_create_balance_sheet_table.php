<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceSheetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('balance_sheet', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer("applicant_id");
            $table->integer("parameter_id");
            $table->integer("value");
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
		Schema::drop('balance_sheet');
	}

}
