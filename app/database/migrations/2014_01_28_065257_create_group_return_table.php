<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupReturnTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_return', function(Blueprint $table)
		{
			$table->increments('id');
                                                $table->string('group_id');
                                                $table->integer('granted_id');
                                                $table->integer('amount');
                                                $table->date('return_date');
                                                $table->string('comments');
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
		Schema::drop('group_return');
	}

}
