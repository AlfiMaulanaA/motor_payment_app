<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // id (primary key)
            $table->string('name'); // name
            $table->string('email')->unique(); // email (unique)
            $table->timestamp('email_verified_at')->nullable(); // email_verified_at
            $table->string('password'); // password
            $table->rememberToken(); // remember_token
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
