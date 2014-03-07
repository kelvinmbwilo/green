<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutflowTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inflow', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer("applicant_id");
            $table->integer("parameter_id");
            $table->integer("jan");
            $table->integer("feb");
            $table->integer("mar");
            $table->integer("apr");
            $table->integer("may");
            $table->integer("jun");
            $table->integer("jul");
            $table->integer("aug");
            $table->integer("sep");
            $table->integer("oct");
            $table->integer("nov");
            $table->integer("dec");
            $table->integer("total");
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
		Schema::drop('inflow');
	}

}
