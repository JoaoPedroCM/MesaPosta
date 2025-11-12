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
            $table->string("titulo"); // Nome da Receita
            $table->string("slug")->unique(); // URL amigável (parte do link da receita)
            $table->string("imagem_capa")->nullable(); // Aponta para a imagem da capa
            $table->unsignedSmallInteger("tempo_preparo"); // Tempo de preparo da receita
            $table->text("ingredientes"); // Ingredientes da receita
            $table->text("modo_preparo"); // Modo de preparo da receita
            $table->timestamps(); // Registro de data e hora de alterações
            $table->softDeletes(); // Registro de data de inativação de usuário
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
