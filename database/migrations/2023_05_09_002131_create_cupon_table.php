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
        Schema::create('cupon', function (Blueprint $table) {
            $table->string('ID_Cupon', 6)->primary();
            $table->string('Titulo_Cupon', 256);
            $table->float('Precio_Regular_Cupon', 10, 0);
            $table->float('Precio_Oferta_Cupon', 10, 0);
            $table->dateTime('Fecha_Inicio_Oferta_Cupon');
            $table->dateTime('Fecha_Fin_Oferta_Cupon');
            $table->dateTime('Fecha_Limite_Cupon');
            $table->string('Descripcion_Cupon', 256);
            $table->integer('Cantidad_Cupon');
            $table->integer('Estado_Cupon');
            $table->string('ID_Empresa', 6)->index('ID_Empresa');
            $table->string('Img', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cupon');
    }
};
