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
        Schema::create('motors', function (Blueprint $table) {
            $table->string('motor_kode', 10)->primary();
            $table->string('motor_merk', 15);
            $table->string('motor_type', 15);
            $table->string('motor_warna_pilihan', 70);
            $table->double('motor_harga');
            $table->binary('motor_gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel lain yang memiliki foreign key ke 'motors'
        Schema::table('beli_cash', function (Blueprint $table) {
            $table->dropForeign(['motor_kode']); // Hapus foreign key di tabel 'beli_cash'
        });

        Schema::table('beli_kredit', function (Blueprint $table) {
            $table->dropForeign(['motor_kode']); // Hapus foreign key di tabel 'beli_kredit'
        });

        // Setelah foreign key dihapus, tabel 'motors' bisa dihapus
        Schema::dropIfExists('motors');
    }
};
