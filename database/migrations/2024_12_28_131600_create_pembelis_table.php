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
        Schema::create('pembelis', function (Blueprint $table) {
            $table->string('pembeli_No_KTP', 17)->primary();
            $table->string('pembeli_nama', 25);
            $table->string('pembeli_alamat', 60);
            $table->string('pembeli_telpon', 15);
            $table->string('pembeli_HP', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus foreign key constraints di tabel yang merujuk ke pembelis
        Schema::table('beli_cash', function (Blueprint $table) {
            $table->dropForeign(['pembeli_No_KTP']);
        });

        Schema::table('beli_kredit', function (Blueprint $table) {
            $table->dropForeign(['pembeli_No_KTP']);
        });

        // Setelah foreign key dihapus, tabel pembelis bisa dihapus
        Schema::dropIfExists('pembelis');
    }
};
