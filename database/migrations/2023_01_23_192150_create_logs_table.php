<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->timestamps();
            $table->bigInteger('id_responsavel');
            $table->string('nome_responsavel');
            $table->string('empresa');
            $table->string('metodo');
            $table->bigInteger('id_cliente')->default(null);
            $table->string('nome_cliente')->default('Não informado');
            $table->string('documento_cliente')->default('Não informado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
