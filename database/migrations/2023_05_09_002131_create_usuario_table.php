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
        Schema::create('usuario', function (Blueprint $table) {
            $table->string('id', 6)->primary();
            $table->string('Nombre_Usuario', 256);
            $table->string('Contraseña_Usuario', 256);
            $table->string('Correo_Usuario', 256);
            $table->dateTime('Fecha_Nacimiento_Usuario');
            $table->string('Identificacion_Usuario', 256);
            $table->integer('Estado_Usuario');
            $table->string('ID_Rol', 6)->index('ID_Rol');
            $table->string('ID_Empresa', 6)->nullable()->index('ID_Empresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
};
