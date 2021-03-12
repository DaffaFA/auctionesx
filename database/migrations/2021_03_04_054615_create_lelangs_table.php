<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLelangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_lelang', function (Blueprint $table) {
            $table->increments('id_lelang');
            $table->unsignedInteger('id_barang');
            $table->date('tgl_lelang');
            $table->bigInteger('harga_akhir')->nullable();
            $table->unsignedInteger('id_user')->nullable();
            $table->unsignedInteger('id_petugas');
            $table->enum('status', ['dibuka', 'ditutup']);
            $table->timestamp('updated_at');

            $table->foreign('id_barang')->references('id_barang')->on('tb_barang')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_user')->references('id_user')->on('tb_masyarakat')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_petugas')->references('id_petugas')->on('tb_petugas')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lelangs');
    }
}
