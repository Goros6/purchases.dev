<?php

/**
 * Created by PhpStorm.
 * User: Goros
 * Date: 12.11.2014
 * Time: 0:14
 */
class PlannedPurchaseSeeder extends \Illuminate\Database\Seeder
{
	public function run()
	{
		//DB::table('plannedPurchases')->delete();

		PlannedPurchase::create([
			'id'              => 1,
			'numLot'          => 1,
			'plannedPrice'    => 1200000,
			'name'            => 'Покупка очень нужная',
			'performanceDate' => '10.12.2015',
			'deadlineDate'    => '01.01.2015',
			'pattern_id'      => 1,
			'unit_id'         => 5,
			'kbk'             => '532132546876525432145642',
			//'okved'       => '334123',
			'okpd'            => '653244',
			'minDemands'      => 'Покупаем вещь вот таких размеров, вот такого веса и такого цвета из такого материала',
			'unitMeasurement' => 'шт.',
			'amount'          => '5',
			'method'          => 'котировки',
			'changeRatio'     => ' '
		]);
	}
} 