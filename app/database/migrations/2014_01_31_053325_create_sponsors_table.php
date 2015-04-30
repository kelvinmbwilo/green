<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sponsors', function(Blueprint $table)
		{
			$table->increments('id');
                                                $table->integer('application_id');
                                                $table->string('firstname');
                                                $table->string('middlename');
                                                $table->string('lastname');
                                                $table->string('gender');
                                                $table->string('phone');
                                                $table->string('postal');
                                                $table->string('residense');
                                                $table->date('birthdate');
                                                $table->text('other');
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
		Schema::drop('sponsors');
	}

}
