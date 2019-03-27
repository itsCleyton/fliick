<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('eventos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 45);
			$table->dateTime('data_inicio')->nullable();
			$table->dateTime('data_fim')->nullable();
			$table->integer('usu_id')->index('fk_eventos_usuarios_idx');
			$table->binary('foto_p', 16777215)->nullable();
			$table->binary('foto_m', 16777215)->nullable();
			$table->binary('foto_g', 16777215)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('eventos');
	}

}
