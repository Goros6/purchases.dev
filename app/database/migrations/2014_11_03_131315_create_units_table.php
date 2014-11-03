<?php

use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Таблица подразделений организации - владельца системы
		Schema::create('units', function ($table) {
			$table->increments('id')->unsigned();
			$table->string('name', 500);
			$table->integer('parent_id'); // ИД родительского подразделения
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('units');
	}

}
