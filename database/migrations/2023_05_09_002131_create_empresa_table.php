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
        Schema::create('empresa', function (Blueprint $table) {
            $table->string('ID_Empresa', 6)->primary();
            $table->string('Nombre_Empresa', 256);
            $table->string('Rubro_Empresa', 256);
            $table->float('Comision_Empresa', 10, 0);
            $table->integer('Estado_Empresa');
            $table->dateTime('Fecha_Creacion_Empresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
};
