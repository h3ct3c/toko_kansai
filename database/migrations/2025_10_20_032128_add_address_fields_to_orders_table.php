<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->string('jalan')->nullable();
        $table->string('provinsi')->nullable();
        $table->string('kota')->nullable();
        $table->string('kecamatan')->nullable();
        $table->string('kelurahan')->nullable();
        $table->string('kode_pos')->nullable();
        $table->string('nomor_telepon')->nullable();
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn([
            'jalan', 'provinsi', 'kota', 'kecamatan',
            'kelurahan', 'kode_pos', 'nomor_telepon'
        ]);
    });
}

};
