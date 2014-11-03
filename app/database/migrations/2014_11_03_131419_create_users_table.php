<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Пользователи системы
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->string('name', 200)->unique();  // ФИО
			$table->string('login', 200)->unique(); // логин в системе
			$table->string('password', 32);         // хэш пароля
			$table->string('email', 50);            // адресс электронной почты пользователя
			$table->string('telephone', 50);        // номер телефона пользователя
			$table->integer('role_id')->unsigned();             // ИД роли
			$table->integer('unit_id')->unsigned();             // ИД подразделения
		});

		// роли пользователей системы
		Schema::create('roles', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->string('name', 200);
			$table->string('description', 512); // описание роли
		});

		Schema::table('users', function (Blueprint $table) {
			$table->foreign('unit_id')->references('id')->on('units');
		});

		// привилегии пользователей системы
		Schema::create('privs', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->string('name', 200);
			$table->string('description', 512); // описание привилении
		});
		// Связи роли-привилегии
		Schema::create('priv2roles', function (Blueprint $table) {
			$table->integer('role_id')->unsigned();
			$table->integer('priv_id')->unsigned();
		});

		Schema::table('priv2roles', function (Blueprint $table) {
			$table->foreign('priv_id')->references('id')->on('privs');
			$table->foreign('role_id')->references('id')->on('roles');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
		Schema::drop('roles');
		Schema::drop('privs');
		Schema::drop('priv2roles');
	}

}
