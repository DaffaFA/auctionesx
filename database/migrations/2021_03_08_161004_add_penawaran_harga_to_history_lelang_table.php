<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPenawaranHargaToHistoryLelangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('history_lelang', function (Blueprint $table) {
            $table->bigInteger('penawaran_harga')->after('id_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('history_lelang', function (Blueprint $table) {
            $table->dropColumn('penawaran_harga');
        });
    }
}
