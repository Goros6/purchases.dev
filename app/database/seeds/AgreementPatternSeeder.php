<?php

/**
 * Created by PhpStorm.
 * User: Goros
 * Date: 12.11.2014
 * Time: 8:08
 */
class AgreementPatternSeeder extends Seeder
{

	public function run()
	{
		//DB::table('agreementPatterns')->delete();

		AgreementPattern::create([
			'id'           => 1,
			'name'         => 'Согласование',
			'pattern_id'   => 1,
			'agreement_id' => 1,
			'sequence_id'  => 1
		]);
		AgreementPattern::create([
			'id'           => 2,
			'name'         => 'Согласование шаг 2',
			'pattern_id'   => 1,
			'agreement_id' => 2,
			'sequence_id'  => 2
		]);
	}
} 