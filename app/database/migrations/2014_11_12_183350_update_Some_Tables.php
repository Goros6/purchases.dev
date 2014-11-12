<?php

use Illuminate\Database\Migrations\Migration;

class UpdateSomeTables extends Migration
{

	/**
	 * Run the migrations.
	 * 1. AgreementRecord - добавить timestamps
	 * 2. Enterprise -  удалить timestamps
	 * 3. PlannedPurchases - добавить timestamps
	 * 4. PlannedPurchases - changeRatio сделать nullable
	 * 5. agreementPatterns -    убрать уникальность имени шаблона
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('agreementRecords', function ($table) {
			$table->timestamps();
		});

		Schema::table('enterprises', function ($table) {
			$table->dropColumn('created_at', 'updated_at');
		});

		Schema::table('plannedPurchases', function ($table) {
			$table->timestamps();
			$table->dropColumn('changeRatio');
		});
		Schema::table('plannedPurchases', function ($table) {
			$table->string('changeRatio', 100)->nullable();
		});

		Schema::table('agreementPatterns', function ($table) {
			$table->dropUnique('agreementPatterns_name_unique');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('agreementRecords', function ($table) {
			$table->dropTimestamps();
		});

		Schema::table('enterprises', function ($table) {
			$table->timestamps();
		});

		Schema::table('plannedPurchases', function ($table) {
			$table->dropTimestamps();
			$table->dropColumn('changeRatio');
		});
		Schema::table('plannedPurchases', function ($table) {
			$table->string('changeRatio', 100);
		});

		Schema::table('agreementPatterns', function ($table) {
			$table->unique('name');
		});
	}

}
