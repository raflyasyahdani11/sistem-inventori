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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama');
            $table->integer('jumlah');
            $table->unsignedBigInteger('id_jenis_barang');
            $table->unsignedBigInteger('id_satuan_barang');
            $table->timestamps();
            $table->softDeletes();
            
            // Foreign Key
            $table->foreign('id_jenis_barang')->references('id')->on('jenis_barang');
            $table->foreign('id_satuan_barang')->references('id')->on('satuan_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
