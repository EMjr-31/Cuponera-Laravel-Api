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
        Schema::table('cupon', function (Blueprint $table) {
            $table->foreign(['ID_Empresa'], 'cupon_ibfk_1')->references(['ID_Empresa'])->on('empresa')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cupon', function (Blueprint $table) {
            $table->dropForeign('cupon_ibfk_1');
        });
    }
};
