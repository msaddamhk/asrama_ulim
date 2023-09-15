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
        Schema::create('nama_aset', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_aset_id');
            $table->string('nama');
            $table->foreign('kategori_aset_id')->references('id')->on('kategori_aset')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nama_aset');
    }
};
