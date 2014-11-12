<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('purchases')->delete();
		DB::table('plannedPurchases')->delete();
		DB::table('agreementPatterns')->delete();
		DB::table('agreements')->delete();
		DB::table('enterprises')->delete();
		DB::table('users')->delete();
		DB::table('priv2roles')->delete();
		DB::table('roles')->delete();
		DB::table('privs')->delete();
		DB::table('units')->delete();
		DB::table('purchaseStatuses')->delete();

		$this->call('PurchaseStatusesSeeder');
		$this->command->info(' PurchaseStatuses table seeded!');
		$this->call('UnitSeeder');
		$this->command->info(' Units table seeded!');
		$this->call('PrivSeeder');
		$this->command->info(' Privs table seeded!');
		$this->call('RoleSeeder');
		$this->command->info(' Roles table seeded!');
		$this->call('Priv2RoleSeeder');
		$this->command->info(' Priv2Roles table seeded!');
		$this->call('UserSeeder');
		$this->command->info(' Users table seeded!');
		$this->call('EnterpriseSeeder');
		$this->command->info(' Enterprises table seeded!');
		$this->call('AgreementSeeder');
		$this->command->info(' Agreements table seeded!');
		$this->call('AgreementPatternSeeder');
		$this->command->info(' AgreementPatterns table seeded!');
		$this->call('PlannedPurchaseSeeder');
		$this->command->info(' PlannedPurchases table seeded!');
		$this->call('PurchaseSeeder');
		$this->command->info(' Purchases table seeded!');
	}

}
