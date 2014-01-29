<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->increments('id');
                                                $table->string('firstname');
                                                $table->string('middlename');
                                                $table->string('lastname');
                                                $table->string('phone');
                                                $table->string('email');
                                                $table->string('role');
                                                $table->string('gender');
                                                $table->string('password');
                                                $table->string('status');
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
		Schema::drop('user');
	}

}
