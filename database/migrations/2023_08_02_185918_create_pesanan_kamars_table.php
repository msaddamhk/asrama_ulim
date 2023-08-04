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
        Schema::create('pesanan_kamar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kamar');
            $table->unsignedBigInteger('id_user');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->enum('status', ['SELESAI', 'AKTIF', 'BELUM DI VERIFIKASI']);
            $table->foreign('id_kamar')->references('id')->on('kamar')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_kamar');
    }
};
