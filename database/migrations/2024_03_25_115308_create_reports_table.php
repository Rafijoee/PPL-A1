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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('handling__statuses_id');
            $table->foreignId('verification_statuses_id');
            $table->string('judul_laporan');
            $table->integer('isi_aduan');
            $table->integer('foto_lokasi');
            $table->string('alamat');
            $table->string('foto_penyuluh')->nullable();
            $table->text('tanggapan_penyuluh')->nullable();
            $table->text('tanggapan_pemerintah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
