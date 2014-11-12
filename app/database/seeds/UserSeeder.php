<?php

/**
 * Created by PhpStorm.
 * User: Goros
 * Date: 12.11.2014
 * Time: 7:57
 */
class UserSeeder extends Seeder
{

	public function run()
	{
		//DB::table('users')->delete();

		User::create([
			'id'        => 1,
			'name'      => 'Генеральный директор',
			'login'     => 'BigBoss',
			'password'  => '1',
			'email'     => 'qw@qw.er',
			'telephone' => '79123212122',
			'role_id'   => 1,
			'unit_id'   => 4
		]);
		User::create([
			'id'        => 2,
			'name'      => 'Главный экономист',
			'login'     => 'GlavBuh',
			'password'  => '1',
			'email'     => 'qr@qw.er',
			'telephone' => '79223212122',
			'role_id'   => 2,
			'unit_id'   => 6
		]);
		User::create([
			'id'        => 3,
			'name'      => 'Исполнитель-экономист',
			'login'     => 'econom',
			'password'  => '1',
			'email'     => 'eqw@qw.er',
			'telephone' => '79166212122',
			'role_id'   => 6,
			'unit_id'   => 5
		]);
		User::create([
			'id'        => 4,
			'name'      => 'исполнитель',
			'login'     => 'User',
			'password'  => '1',
			'email'     => 'qwu@qw.er',
			'telephone' => '79183212122',
			'role_id'   => 5,
			'unit_id'   => 7
		]);
		User::create([
			'id'        => 5,
			'name'      => 'Администратор',
			'login'     => 'Admin',
			'password'  => '1',
			'email'     => 'aqw@qw.er',
			'telephone' => '79129912122',
			'role_id'   => 7,
			'unit_id'   => 8
		]);
	}
} 