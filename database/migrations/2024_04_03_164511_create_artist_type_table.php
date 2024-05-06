<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_type', function (Blueprint $table) {
            $table->id();  // Crée une colonne auto-increment ID pour la table pivot (facultatif)
            $table->foreignId('artist_id')->constrained('artists')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
            // Pas de colonnes 'created_at' et 'updated_at' car $timestamps est désactivé
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artist_type');
    }
};
