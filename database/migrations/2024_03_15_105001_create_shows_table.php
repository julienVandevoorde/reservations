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
            $table->string('slug',60)->unique();
            $table->string('title', 60);
            $table->text('description')->nullable(); // Ajout de la colonne 'description'
            $table->string('poster_url', 255);
            $table->foreignId('location_id')->nullable(); 
            $table->boolean('bookable'); 
            $table->decimal('price', 8, 2); 
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

            $table->foreign('location_id')->references('id')->on('locations')
                    ->onDelete('restrict')->onUpdate('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shows');
    }
};
