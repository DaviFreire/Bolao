<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsCampeonatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campeonatos', function (Blueprint $table) {
            $table->date('dt_inicial');
            $table->date('dt_final');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campeonatos', function (Blueprint $table) {
            $table->dropColumn('dt_inicial');
            $table->dropColumn('dt_final');
        });
    }
}
