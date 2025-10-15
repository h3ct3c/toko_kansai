<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // tambahkan kolom baru
            $table->string('product_name')->nullable()->after('customer_id');
            $table->integer('quantity')->default(1)->after('product_name');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // rollback kalau perlu
            $table->dropColumn(['product_name', 'quantity']);
        });
    }
};
