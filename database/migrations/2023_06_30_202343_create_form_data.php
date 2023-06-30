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
        Schema::create('form_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('numero_identificacion');
            $table->string('nombres');
            $table->string('apellidos');
            $table->date('fecha_nacimiento');
            $table->string('ciudad_nacimiento');
            $table->string('nacionalidad');
            $table->string('direccion_residencia');
            $table->string('barrio');
            $table->string('lugar_residencia');
            $table->string('celular');
            $table->string('correo');
            $table->integer('cantidad_personas_cargo')->nullable();
            $table->boolean('hijos');
            $table->integer('cantidad_hijos')->nullable();
            $table->integer('hijos_viven_con_usted')->nullable();
            $table->integer('hijos_mayores_edad')->nullable();
            $table->boolean('voto_2022_congreso_presidencia')->nullable();
            $table->boolean('voto_2019_alcaldia_gobernacion')->nullable();
            $table->boolean('cedula_inscrita_dagua')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_data');
    }
};
