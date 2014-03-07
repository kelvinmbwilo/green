<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupApplicationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_application', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('group_id');
            $table->integer('applied_amount');
            $table->integer('amount_granted');
            $table->integer('savings_per_return');
            $table->string('status');
            $table->text('comments');
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
		Schema::drop('group_application');
	}

}
