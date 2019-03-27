<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogusuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logusu', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('ip_cliente', 45);
			$table->string('acao', 45);
			$table->dateTime('data')->nullable();
			$table->string('tabela', 45)->nullable();
			$table->integer('usu_id')->index('fk_logusu_usuarios1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('logusu');
	}

}
