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
        Schema::create('aset', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_aset_id');
            $table->unsignedBigInteger('id_kamar');
            $table->string('nama');
            $table->string('foto');
            $table->string('no_aset');
            $table->string('merek');
            $table->integer('jumlah');
            $table->string('kondisi');
            $table->date('tanggal_pembelian');
            $table->timestamps();
            $table->foreign('kategori_aset_id')->references('id')->on('kategori_aset')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_kamar')->references('id')->on('kamar')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};
