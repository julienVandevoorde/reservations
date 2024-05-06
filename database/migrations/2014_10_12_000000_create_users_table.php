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
            $table->string('login', 30)->unique();
            $table->string('password', 255);
            $table->string('firstname', 60);
            $table->string('lastname', 60);
            $table->string('email', 100)->unique();
            $table->string('langue', 2);
            $table->rememberToken(); // For "remember me" functionality
            $table->timestamps(); // Timestamps for created_at and updated_at columns
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
