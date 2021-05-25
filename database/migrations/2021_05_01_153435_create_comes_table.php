<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comes', function (Blueprint $table) {
            $table->id();
            // $table->string('nama');
            // $table->foreign('nama')->references('nama')->on('drugs');
            $table->foreignId('nama')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal');
            $table->string('jumlah');
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
        Schema::dropIfExists('comes');
    }
}
