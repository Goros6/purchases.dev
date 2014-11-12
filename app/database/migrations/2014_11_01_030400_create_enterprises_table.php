<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*Организации, участвующие в процессе подготовки и согласования закупок*/
class CreateEnterprisesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enterprises', function($table)
		{
			$table->increments('id')->primary()->unsigned();
			$table->string('name', 500);
			$table->string('inn', 12);
			$table->string('kpp', 12);
			$table->integer('type')->default(2); /* 1 - собственник системы, 2 - организации с которыми нужно согласовывать закупки*/
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
		Schema::drop('enterprises');
	}

}
