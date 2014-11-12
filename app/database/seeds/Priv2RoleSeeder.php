<?php

/**
 * Created by PhpStorm.
 * User: Goros
 * Date: 11.11.2014
 * Time: 23:37
 */
class Priv2RoleSeeder extends \Illuminate\Database\Seeder
{
	public function run()
	{
		//DB::table('priv2roles')->delete();

		Priv2Role::create([
			'role_id' => 1,
			'priv_id' => 1
		]);
		Priv2Role::create([
			'role_id' => 1,
			'priv_id' => 2
		]);
		Priv2Role::create([
			'role_id' => 1,
			'priv_id' => 3
		]);
		Priv2Role::create([
			'role_id' => 1,
			'priv_id' => 6
		]);
		Priv2Role::create([
			'role_id' => 2,
			'priv_id' => 1
		]);
		Priv2Role::create([
			'role_id' => 2,
			'priv_id' => 2
		]);
		Priv2Role::create([
			'role_id' => 2,
			'priv_id' => 4
		]);
		Priv2Role::create([
			'role_id' => 2,
			'priv_id' => 5
		]);
		Priv2Role::create([
			'role_id' => 2,
			'priv_id' => 6
		]);
		Priv2Role::create([
			'role_id' => 3,
			'priv_id' => 2
		]);
		Priv2Role::create([
			'role_id' => 3,
			'priv_id' => 5
		]);
		Priv2Role::create([
			'role_id' => 3,
			'priv_id' => 6
		]);
		Priv2Role::create([
			'role_id' => 4,
			'priv_id' => 1
		]);
		Priv2Role::create([
			'role_id' => 4,
			'priv_id' => 2
		]);
		Priv2Role::create([
			'role_id' => 4,
			'priv_id' => 5
		]);
		Priv2Role::create([
			'role_id' => 4,
			'priv_id' => 6
		]);
		Priv2Role::create([
			'role_id' => 4,
			'priv_id' => 7
		]);
		Priv2Role::create([
			'role_id' => 4,
			'priv_id' => 8
		]);
		Priv2Role::create([
			'role_id' => 5,
			'priv_id' => 1
		]);
		Priv2Role::create([
			'role_id' => 5,
			'priv_id' => 2
		]);
		Priv2Role::create([
			'role_id' => 5,
			'priv_id' => 6
		]);
		Priv2Role::create([
			'role_id' => 5,
			'priv_id' => 7
		]);
		Priv2Role::create([
			'role_id' => 5,
			'priv_id' => 8
		]);
		Priv2Role::create([
			'role_id' => 6,
			'priv_id' => 1
		]);
		Priv2Role::create([
			'role_id' => 6,
			'priv_id' => 2
		]);
		Priv2Role::create([
			'role_id' => 6,
			'priv_id' => 5
		]);
		Priv2Role::create([
			'role_id' => 6,
			'priv_id' => 6
		]);
		Priv2Role::create([
			'role_id' => 6,
			'priv_id' => 8
		]);
		Priv2Role::create([
			'role_id' => 7,
			'priv_id' => 1
		]);
		Priv2Role::create([
			'role_id' => 7,
			'priv_id' => 2
		]);
		Priv2Role::create([
			'role_id' => 7,
			'priv_id' => 9
		]);
	}
} 