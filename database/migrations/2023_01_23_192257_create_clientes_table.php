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
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->timestamps();
            $table->boolean('status');
            $table->string('cidade');
            $table->string('documento')->unique();
            $table->bigInteger('id_empresa');
            $table->string('nome');
            $table->string('data_vencimento');
            $table->string('data_bloqueio')->nullable();
            $table->boolean('bloqueado')->default(0);
            $table->integer('qtd_carencia')->nullable();
            $table->decimal('valor', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
