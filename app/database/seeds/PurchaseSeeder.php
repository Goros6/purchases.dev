<?php

/**
 * Created by PhpStorm.
 * User: Goros
 * Date: 11.11.2014
 * Time: 23:57
 */
class PurchaseSeeder extends \Illuminate\Database\Seeder
{
	public function run()
	{
		//DB::table('purchases')->delete();

		Purchase::create([
			'id'          => 1,
			'user_id'     => 4,
			'name'        => 'Покупка очень нужная',
			'description' => 'Покупаем вещь вот таких размеров, вот такого веса и такого цвета из такого материала',
			'price'       => 1000000,
			'status_id'   => 1,
			'pattern_id'  => 1,
			'plan_id'     => 1
		]);
		Purchase::create([
			'id'          => 2,
			'user_id'     => 4,
			'name'        => 'Другая покупка, тоже очень нужная',
			'description' => 'Покупаем вещь вот других размеров, вот такого веса и такого цвета из такого материала и с огромными колёсами',
			'price'       => 10000000,
			'status_id'   => 1,
			'pattern_id'  => 1,
			'plan_id'     => 1
		]);
	}
} 