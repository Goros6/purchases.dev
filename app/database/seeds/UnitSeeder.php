<?php

/**
 * Created by PhpStorm.
 * User: Goros
 * Date: 12.11.2014
 * Time: 7:49
 */
class UnitSeeder extends Seeder
{

	public function run()
	{
		//DB::table('units')->delete();

		Unit::create([
			'id'        => 1,
			'name'      => 'Руководство',
			'parent_id' => 0 // верхний уровень иерархии
		]);
		Unit::create([
			'id'        => 2,
			'name'      => 'Отдел экономики',
			'parent_id' => 1
		]);
		Unit::create([
			'id'        => 3,
			'name'      => 'Отдел закупок',
			'parent_id' => 1
		]);
		Unit::create([
			'id'        => 4,
			'name'      => 'Руководитель 1',
			'parent_id' => 1
		]);
		Unit::create([
			'id'        => 5,
			'name'      => 'Экономист 1',
			'parent_id' => 2
		]);
		Unit::create([
			'id'        => 6,
			'name'      => 'Главный экономист 1',
			'parent_id' => 1
		]);
		Unit::create([
			'id'        => 7,
			'name'      => 'Исполнитель 1',
			'parent_id' => 3
		]);
		Unit::create([
			'id'        => 8,
			'name'      => 'Администратор 1',
			'parent_id' => 3
		]);
	}

} 