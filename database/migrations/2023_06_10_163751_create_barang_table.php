<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('harga');
            $table->unsignedBigInteger('id_jenis_barang');
            $table->unsignedBigInteger('id_satuan_barang');
            $table->unsignedBigInteger('id_supplier');
            $table->timestamps();
            $table->softDeletes();
            
            // Foreign Key
            $table->foreign('id_jenis_barang')->references('id')->on('jenis_barang');
            $table->foreign('id_satuan_barang')->references('id')->on('satuan_barang');
            $table->foreign('id_supplier')->references('id')->on('supplier');
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
