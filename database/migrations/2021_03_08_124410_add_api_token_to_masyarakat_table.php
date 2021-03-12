<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApiTokenToMasyarakatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_masyarakat', function (Blueprint $table) {
            $table->string('api_token', 80)->nullable()->unique()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_masyarakat', function (Blueprint $table) {
            $table->dropColumn('api_token');
        });
    }
}
