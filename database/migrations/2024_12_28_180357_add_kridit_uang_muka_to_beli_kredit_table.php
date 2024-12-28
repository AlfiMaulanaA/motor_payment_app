<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('beli_kredit', function (Blueprint $table) {
            $table->decimal('kridit_uang_muka', 15, 2)->after('motor_kode')->nullable();
        });
    }

    public function down()
    {
        Schema::table('beli_kredit', function (Blueprint $table) {
            $table->dropColumn('kridit_uang_muka');
        });
    }
};
