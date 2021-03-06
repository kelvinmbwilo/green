<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loans', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->integer('minimum_amount');
            $table->integer('maximum_amount');
            $table->integer('minReturnTime');
            $table->integer('MaxReturnTime');
            $table->integer('profit');
            $table->text("other");
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
		Schema::drop('loans');
	}

}
