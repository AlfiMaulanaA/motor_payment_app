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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('admin'); // Default value 'admin'
            $table->string('email')->unique()->default('admin@example.com'); // Default value 'admin@example.com'
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('$2y$12$ds4P914vGUhulVDU42/pzemXL4wPcU4d59.jGTNuVz5lvkeezbrTS'); // Default hashed password
            $table->rememberToken();
            $table->timestamps();

            // Tambahkan kolom role_id sebagai foreign key
            $table->foreignId('role_id')->default(2)->constrained('roles')->onDelete('cascade'); // Default role_id = 1 (Admin)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
