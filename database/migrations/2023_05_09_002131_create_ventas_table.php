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
        Schema::create('ventas', function (Blueprint $table) {
            $table->string('ID_Venta', 6)->primary();
            $table->string('ID_Cupon', 256)->index('ID_Cupon');
            $table->string('ID_Usuario', 256)->index('ID_Usuario');
            $table->dateTime('Fecha_Compra_Venta');
            $table->integer('Estado_Pago_Venta');
            $table->integer('Estado_Canje_Venta');
            $table->dateTime('Fecha_Canje_Venta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};
