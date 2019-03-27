<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome');
			$table->string('email');
			$table->string('senha');
			$table->smallInteger('nivel')->nullable();
			$table->dateTime('criadoem')->nullable();
			$table->dateTime('atualizadoem')->nullable();
			$table->smallInteger('ativo')->nullable()->default(1);
			$table->string('remember_token', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}
