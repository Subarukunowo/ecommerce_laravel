<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('name'); // nama produk
            $table->integer('price'); // harga produk
            $table->string('category')->nullable(); // kategori produk dibuat nullable
            $table->text('description')->nullable(); // deskripsi produk
            $table->string('image')->nullable(); // gambar produk
            $table->timestamps(); // kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
