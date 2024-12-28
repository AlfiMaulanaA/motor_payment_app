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
        Schema::create('bayar_cicilan', function (Blueprint $table) {
            $table->string('cicilan_kode', 10)->primary();
            $table->string('kridit_kode', 10);
            $table->date('cicilan_tanggal');
            $table->bigInteger('cicilan_jumlah');
            $table->integer('cicilan_ke');
            $table->integer('cicilan_sisa_ke');
            $table->double('cicilan_sisa_harga');
            $table->timestamps();

            $table->foreign('kridit_kode')->references('kridit_kode')->on('beli_kredit');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bayar_cicilans');
    }
};
