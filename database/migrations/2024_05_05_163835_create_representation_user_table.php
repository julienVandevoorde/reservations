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
        Schema::create('representation_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('representation_id')->constrained()->onDelete('cascade'); // Clé étrangère vers la table representations
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clé étrangère vers la table users
            $table->integer('places');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('representation_user');
    }
};
