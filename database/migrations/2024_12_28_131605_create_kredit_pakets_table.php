<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kredit_paket', function (Blueprint $table) {
            $table->string('paket_kode', 10)->primary();
            $table->double('paket_harga_cash');
            $table->double('paket_uang_muka');
            $table->integer('paket_jumlah_cicilan');
            $table->double('paket_bunga');
            $table->double('paket_nilai_cicilan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kredit_paket'); // Hapus tabel kredit_paket
    }
};
