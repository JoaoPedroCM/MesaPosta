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
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Identificador único do comentário
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Aponta para a receita a qual o comentário pertence
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); //Mantém o usuário no banco de dados quando aplicado o soft delete
            $table->text('content'); // Conteúdo do comentário
            $table->timestamps(); // Registro de data e hora de alterações
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
