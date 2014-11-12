<?php

/**
 * Created by PhpStorm.
 * User: Goros
 * Date: 10.11.2014
 * Time: 7:35
 */
class PrivSeeder extends \Illuminate\Database\Seeder
{
	public function run()
	{
		//DB::table('privs')->delete();

		Priv::create([
			'id'          => 1,
			'name'        => 'PlansView',
			'description' => 'Просмотр плана-графика',
		]);
		Priv::create([
			'id'          => 2,
			'name'        => 'PurchasesNewView',
			'description' => 'Просмотр заявок',
		]);
		Priv::create([
			'id'          => 3,
			'name'        => 'Approval',
			'description' => 'Утверждение заявок',
		]);
		Priv::create([
			'id'          => 4,
			'name'        => 'PlansEdit',
			'description' => 'Создание/корректировка плана-графика',
		]);
		Priv::create([
			'id'          => 5,
			'name'        => 'Agreement',
			'description' => 'Согласование заявок/закупок',
		]);
		Priv::create([
			'id'          => 6,
			'name'        => 'PurchasesView',
			'description' => 'Просмотр закупок',
		]);
		Priv::create([
			'id'          => 7,
			'name'        => 'PurchasesCreation',
			'description' => 'Создание заявок',
		]);
		Priv::create([
			'id'          => 8,
			'name'        => 'PurchasesEdit',
			'description' => 'Редактирование заявок/закупок',
		]);
		Priv::create([
			'id'          => 9,
			'name'        => 'Administration',
			'description' => 'Редактирование базовых справочников: списки пользователей, предприятий. Создание шаблонов согласования. и прочее',
		]);
	}
} 