<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualitativeQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qualitative_questions', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer("applicant_id");
            $table->integer("question_id");
            $table->integer("marks");
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
		Schema::drop('qualitative_questions');
	}

}
