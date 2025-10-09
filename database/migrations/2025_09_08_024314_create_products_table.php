<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('image')->nullable(); // gambar produk
            $table->string('name'); // nama produk

            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();

            $table->integer('stock')->default(0);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->default(0);

            // relasi foreign key
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('set null');

            $table->timestamps(); // ini otomatis bikin created_at & updated_at
        });
    }

    /**
     * Balik migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
