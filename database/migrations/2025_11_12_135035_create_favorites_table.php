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
        Schema::create('favorites', function (Blueprint $table) {
            // Remoção de $table->id() para tabelas pivôs
            $table->foreignID("user_id")->constrained()->onDelete("cascade"); // Aponta para o usuário que favoritou
            $table->foreignId("post_id")->constrained()->onDelete("cascade"); // Aponta para o post que foi favoritado
            $table->primary(['user_id', 'post_id']); //Combina os identificadores de usuário e post para criar um novo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
