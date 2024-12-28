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
        Schema::create('beli_kredit', function (Blueprint $table) {
            $table->string('kridit_kode', 10)->primary();
            $table->string('pembeli_No_KTP', 17);
            $table->string('paket_kode', 10);
            $table->string('motor_kode', 10);
            $table->date('kridit_tanggal');
            $table->boolean('fotokopi_KTP');
            $table->boolean('fotokopi_KK');
            $table->boolean('fotokopi_slip_gaji');
            $table->timestamps();

            $table->foreign('pembeli_No_KTP')->references('pembeli_No_KTP')->on('pembelis');
            $table->foreign('paket_kode')->references('paket_kode')->on('kredit_paket');
            $table->foreign('motor_kode')->references('motor_kode')->on('motors');
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beli_kredits');
    }
};
