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
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 60)->nullable()->unique();
            $table->string('title', 60);
            $table->text('description')->nullable();
            $table->string('poster_url', 255)->nullable();
            $table->foreignId('location_id')->nullable()->constrained('locations')->onDelete('cascade');
            $table->boolean('bookable')->default(true); 
            $table->decimal('price', 8, 2)->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shows');
    }
};


