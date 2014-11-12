<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchasingTables extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// для хранения сессий
		Schema::create('sessions', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('id_user')->unsigned(); // пользователь системы
			$table->string('sid', 10)->unique();
			$table->timestamps(); // будем использовать для определения начала сессии и времени последннего обновления
		});

		Schema::table('sessions', function (Blueprint $table) {
			$table->foreign('id_user')->references('id')->on('users');
		});

		// "Статусы заявок"
		Schema::create('purchaseStatuses', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->string('name', 50);
		});

		// "Этапы согласования"  - справочник возможных этапов согласования
		Schema::create('agreements', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('enprise_id')
				->unsigned(); // определяет организацию с кем согласовываем (справочник enterprise)
			$table->integer('unit_id')->unsigned()
				->default(0); // определяет подразделение для внутреннего согласования (справочник units)
			$table->string('name', 50);
			$table->string('description', 500)->nullable();
			$table->integer('duration'); // продолжительность этапа согласования в днях
			$table->integer('endStatus_id')->unsigned()
				->default(0); // ИД статуса, который получит заявка после окончания этапа
		});

		Schema::table('agreements', function (Blueprint $table) {
			$table->foreign('enprise_id')->references('id')->on('enterprises');
			$table->foreign('endStatus_id')->references('id')->on('purchaseStatuses');
		});


		// Шаблоны согласований  - в зависимости от вида закупаемого, необходимо согласование с разными организациями
		Schema::create('agreementPatterns', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->string('name', 50)->unique();
			$table->integer('pattern_id')
				->unsigned(); // Для каждого названия шаблона свой ИД. понему будем поределять состав согласования каждой заявки
			$table->integer('agreement_id')->unsigned(); // ИД этапа согласования
			$table->integer('sequence_id')->unsigned(); // порядковый номер этапа согласования в шаблоне
		});
		Schema::table('agreementPatterns', function (Blueprint $table) {
			$table->foreign('agreement_id')->references('id')->on('agreements');
		});
		// "План - график закупок" (purchasePlans)
		/*  В стандартной форме - такие поля:
		    КБК
			ОКВЭД
			ОКПД
			№ заказа (№ лота)
			Наименование предмета контракта
			Минимально необходимые требования, предъявляемые к предмету контракта
			Ед. измерения
			Количество (объем)
			Ориентировочная начальная (максимальная) цена контракта, тыс. руб.
			Условия финансового обеспечения исполнения контракта (включая размер аванса )
			Срок размещения заказа (месяц, год)
			Срок исполнения контракта (месяц, год)
			Способ размещения заказа
			Обоснование внесения изменений
		 * */
		Schema::create('plannedPurchases', function (Blueprint $table) {
			// поля для непосредственной работы системы
			$table->increments('id')->unsigned();
			$table->integer('numLot');              // № заказа (№ лота)
			$table->integer('plannedPrice');        //Ориентировочная начальная (максимальная) цена контракта, руб.
			$table->string('name', 50)->unique();   // Наименование предмета контракта
			$table->date('performanceDate');        //Срок исполнения контракта (месяц, год)
			$table->date('deadlineDate');           //Срок размещения заказа (месяц, год)

			// связи с таблицами системы
			$table->integer('pattern_id')
				->unsigned(); // для каждой строки должен быть определен тип шаблона согласования
			$table->integer('unit_id')->unsigned(); // ответственное подразделение

			// Коды справочников для пользовательских выборок
			$table->string('kbk', 24);     //КБК расходов бюджета (с разделителями группы)
			$table->string('okved', 50);     // ОКВЭД может быть несколько, пусть пока будут просто строкой
			$table->string('okpd', 50);     // ОКПД может быть несколько, пусть пока будут просто строкой

			// другие поля для совместимости со стандартной формой
			$table->string('minDemands', 500);      // Минимально необходимые требования, предъявляемые к предмету контракта
			$table->string('unitMeasurement', 50);  //Ед. измерения
			$table->string('amount', 100);          //Количество (объем)
			$table->string('Conditions', 500)
				->nullable();     // Условия финансового обеспечения исполнения контракта (включая размер аванса)
			$table->string('method', 100);          //Способ размещения заказа
			$table->string('changeRatio', 100);          //Обоснование внесения изменений
		});

		Schema::table('plannedPurchases', function (Blueprint $table) {
			$table->foreign('pattern_id')->references('id')->on('agreementPatterns');
			$table->foreign('unit_id')->references('id')->on('units');
		});
		// Данные по каждой закупке
		Schema::create('purchases', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned(); // пользователь создавший заявку (справочник users)
			$table->string('name', 50);
			$table->string('description', 500);
			$table->timestamps();                   // время создания записи и последний модификации
			$table->dateTime('startDate')->nullable()->default(null);         // Время отправки на согласование
			$table->integer('price');        //фактическая цена контракта, руб.
			$table->integer('status_id')->unsigned(); //текущий статус записи. сначала 0 - создана
			$table->binary('descriptionFile')->nullable();      // файл с пояснительной запиской
			$table->binary('specificationFile')->nullable();    // файл техническим заданием
			$table->binary('startPriceFile')->nullable();       // файл c расчетом начальной цены торгов
			$table->binary('contractFile')->nullable();         // файл c проектом контракта
			$table->binary('additionFile')->nullable();         // файл с дополнительными материалами
			$table->integer('pattern_id')->unsigned();  // ИД типа согласования
			$table->integer('plan_id')->unsigned();  // ИД строки плана по которой будет финансироваться закупка
		});
		Schema::table('purchases', function (Blueprint $table) {
			$table->foreign('pattern_id')->references('id')->on('agreementPatterns');
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('plan_id')->references('id')->on('plannedPurchases');
			$table->foreign('status_id')->references('id')->on('purchaseStatuses');
		});
		// Рабочая таблица для процесса согласования
		Schema::create('agreementRecords', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('purchase_id')->unsigned();
			$table->integer('agreement_id')->unsigned();
			$table->date('planeDate')->nullable()->default(null);       // Плановая дата этапа
			$table->date('realDate')->nullable()->default(null);        // Фактическая дата
			$table->string('comment', 500);     // примечания, комментарии
		});
		Schema::table('agreementRecords', function (Blueprint $table) {
			$table->foreign('purchase_id')->references('id')->on('purchases');
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('agreement_id')->references('id')->on('agreements');
		});

		// связь для пользователя с ролью добавим
		Schema::table('users', function (Blueprint $table) {
			$table->foreign('role_id')->references('id')->on('roles');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->dropForeign('role_id');
		});
		Schema::drop('sessions');
		Schema::drop('agreementRecords');
		Schema::drop('purchases');
		Schema::drop('plannedPurchases');
		Schema::drop('purchaseStatuses');
		Schema::drop('agreements');
		Schema::drop('agreementPatterns');

	}

}
