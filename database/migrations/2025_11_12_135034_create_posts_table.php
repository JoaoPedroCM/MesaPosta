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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Identificador único da postagem
            $table->foreignId('user_id')->constrained(); // Aponta para o autor do post
            $table->string("title"); // Nome da Receita
            $table->string("slug")->unique(); // URL amigável (parte do link da receita)
            $table->string("image_cover")->nullable(); // Aponta para a imagem da capa
            $table->unsignedSmallInteger("preparation_time"); // Tempo de preparo da receita
            $table->text("ingredients"); // Ingredientes da receita
            $table->text("preparation_instructions"); // Modo de preparo da receita
            $table->timestamps(); // Registro de data e hora de alterações
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
