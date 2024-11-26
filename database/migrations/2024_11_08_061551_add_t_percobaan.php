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
        Schema::create('t_percobaan', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama', 100); // Nama percobaan
            $table->text('deskripsi'); // Deskripsi percobaan
            $table->date('tanggal_mulai'); // Tanggal mulai percobaan
            $table->date('tanggal_selesai'); // Tanggal selesai percobaan
            $table->string('status', 20); // Status (misalnya: aktif, selesai)
            $table->integer('durasi'); // Durasi dalam jam
            $table->decimal('biaya', 8, 2); // Biaya dalam format decimal
            $table->unsignedBigInteger('id_peneliti'); // ID peneliti
            $table->string('lokasi', 100); // Lokasi percobaan
            $table->float('suhu_awal'); // Suhu awal percobaan
            $table->float('suhu_akhir'); // Suhu akhir percobaan
            $table->boolean('dokumentasi'); // Apakah ada dokumentasi?
            $table->json('hasil_data'); // Data hasil dalam format JSON
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_percobaan');
    }
};
