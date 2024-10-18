<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flash_sales', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->decimal('original_price', 10, 2); // 10 digit total, 2 digit di belakang koma
            $table->decimal('discount_price', 10, 2); // 10 digit total, 2 digit di belakang koma
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('stock');
            $table->boolean('status')->default(true);
            $table->string('image')->nullable();
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flash_sales');
    }
};
