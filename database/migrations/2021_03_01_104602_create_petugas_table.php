<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_petugas', function (Blueprint $table) {
            $table->increments('id_petugas');
            $table->string('nama_petugas', 25);
            $table->string('username', 25)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedInteger('id_level');
            $table->timestamps();

            $table->foreign('id_level')->references('id_level')->on('tb_level')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugas');
    }
}
