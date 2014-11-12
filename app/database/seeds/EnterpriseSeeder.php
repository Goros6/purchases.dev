<?php

/**
 * Created by PhpStorm.
 * User: Goros
 * Date: 10.11.2014
 * Time: 7:27
 */
class EnterpriseSeeder extends \Illuminate\Database\Seeder
{
	public function run()
	{
		//DB::table('enterprises')->delete();

		Enterprise::create([
			'id'   => 1,
			'name' => 'ГП Покупатель',
			'inn'  => '99990011245',
			'kpp'  => '99990000001',
			'type' => 1, // Владелец системы
		]);
		Enterprise::create([
			'id'   => 2,
			'name' => 'Coгласователь 1',
			'inn'  => '99934535178',
			'kpp'  => '99990000001',
			'type' => 2,
		]);
		Enterprise::create([
			'id'   => 3,
			'name' => 'Coгласователь 2',
			'inn'  => '99934535555',
			'kpp'  => '99990000001',
			'type' => 2,
		]);
	}
} 