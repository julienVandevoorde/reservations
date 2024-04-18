<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 60);
            $table->string('title', 60);
            $table->string('text');
            $table->string('poster_url', 255);
            $table->unsignedBigInteger('location_id'); 
            $table->boolean('bookable'); 
            $table->decimal('price', 8, 2); 
            $table->timestamps();
            
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shows');
    }
};
