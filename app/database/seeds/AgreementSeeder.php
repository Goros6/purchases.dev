<?php

/**
 * Created by PhpStorm.
 * User: Goros
 * Date: 10.11.2014
 * Time: 7:09
 */
class AgreementSeeder extends \Illuminate\Database\Seeder
{
	public function run()
	{
		//DB::table('agreements')->delete();

		Agreement::create([
			'id'           => 1,
			'name'         => 'Утверждение заявки',
			'enprise_id'   => 1,
			'unit_id'      => 1,
			'description'  => 'Если руководитель согласен, запускаем в работу',
			'duration'     => 3, //дня
			'endStatus_id' => 3
		]);
		Agreement::create([
			'id'           => 2,
			'name'         => 'Внешнее согласование 1',
			'enprise_id'   => 2,
			'unit_id'      => 0,
			'description'  => 'Согласуем с разрещающей организацией',
			'duration'     => 15, //дней
			'endStatus_id' => 4
		]);
		Agreement::create([
			'id'           => 3,
			//'name'=>'Внешнее согласование 2',
			'enprise_id'   => 3,
			'unit_id'      => 0,
			'description'  => 'Согласуем с другой разрещающей организацией',
			'duration'     => 15, //дней
			'endStatus_id' => 4
		]);
	}
}