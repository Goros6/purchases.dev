<?php

/**
 * Created by PhpStorm.
 * User: Goros
 * Date: 06.11.2014
 * Time: 1:26
 */
class PurchaseStatusesSeeder extends Seeder
{

	public function run()
	{
		//DB::table('purchaseStatuses')->delete();

		PurchaseStatus::create([
			'id'   => 1,
			'name' => 'создана'
		]);
		PurchaseStatus::create([
			'id'   => 2,
			'name' => 'на согласовании'
		]);
		PurchaseStatus::create([
			'id'   => 3,
			'name' => 'закупка'
		]);
		PurchaseStatus::create([
			'id'   => 4,
			'name' => 'закупка согласована'
		]);
		PurchaseStatus::create([
			'id'   => 5,
			'name' => 'размещена'
		]);
		PurchaseStatus::create([
			'id'   => 6,
			'name' => 'проведена'
		]);
		PurchaseStatus::create([
			'id'   => 7,
			'name' => 'торги провалены'
		]);
	}

}