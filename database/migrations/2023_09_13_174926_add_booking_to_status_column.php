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
        Schema::table('pesanan_kamar', function (Blueprint $table) {
            $table->enum('status', ['SELESAI', 'AKTIF', 'BELUM DI VERIFIKASI', 'DI TOLAK', 'BOOKING'])
                ->default('BELUM DI VERIFIKASI')
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanan_kamar', function (Blueprint $table) {
            $table->enum('status', ['SELESAI', 'AKTIF', 'BELUM DI VERIFIKASI', 'DI TOLAK'])
                ->default('BELUM DI VERIFIKASI')
                ->change();
        });
    }
};
