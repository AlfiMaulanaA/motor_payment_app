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
        Schema::create('beli_cash', function (Blueprint $table) {
            $table->string('cash_kode', 10)->primary();
            $table->string('pembeli_No_KTP', 17);
            $table->string('motor_kode', 10);
            $table->date('cash_tanggal');
            $table->double('cash_bayar');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('pembeli_No_KTP')
                ->references('pembeli_No_KTP')
                ->on('pembelis')
                ->onDelete('cascade');

            $table->foreign('motor_kode')
                ->references('motor_kode')
                ->on('motors')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Pastikan tabel ada sebelum menghapus foreign key dan tabel
        if (Schema::hasTable('beli_cash')) {
            Schema::table('beli_cash', function (Blueprint $table) {
                if (Schema::hasColumn('beli_cash', 'motor_kode')) {
                    $table->dropForeign(['motor_kode']);
                }
                if (Schema::hasColumn('beli_cash', 'pembeli_No_KTP')) {
                    $table->dropForeign(['pembeli_No_KTP']);
                }
            });
        }

        Schema::dropIfExists('beli_cash');
    }
};
