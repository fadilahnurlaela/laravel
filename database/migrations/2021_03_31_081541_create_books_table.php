<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('nama')->unique();
            $table->string('kategori');
            $table->string('merek');
            $table->string('harga');
            $table->string('stok');
            $table->bigInteger('categories')->unsigned();
            $table->bigInteger('brands')->unsigned();
            $table->foreign('categories')->references('id')->on('categories');
            $table->foreign('brands')->references('id')->on('brands');
            $table->string('cover')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
