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
        Schema::table('ventas', function (Blueprint $table) {
            $table->foreign(['ID_Cupon'], 'ventas_ibfk_1')->references(['ID_Cupon'])->on('cupon')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ID_Usuario'], 'ventas_ibfk_2')->references(['ID_Usuario'])->on('usuario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->dropForeign('ventas_ibfk_1');
            $table->dropForeign('ventas_ibfk_2');
        });
    }
};
