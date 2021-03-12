<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenawaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_lelang', function (Blueprint $table) {
            $table->increments('id_history');
            $table->unsignedInteger('id_lelang');
            $table->unsignedInteger('id_barang');
            $table->unsignedInteger('id_user');
            $table->timestamps();

            $table->foreign('id_lelang')->references('id_lelang')->on('tb_lelang')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_barang')->references('id_barang')->on('tb_barang')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_user')->references('id_user')->on('tb_masyarakat')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penawarans');
    }
}
