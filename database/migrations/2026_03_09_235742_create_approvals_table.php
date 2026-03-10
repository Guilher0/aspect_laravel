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
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->string('student_name'); // e.g., 'Aluno NERD✨'
            $table->string('course'); // e.g., 'Aprovado em Agronomia no Pará'
            $table->longText('image_base64')->nullable(); // Para salvar as imagens do aluno/prof
            $table->string('author_image_base64')->nullable(); // Para salvar imagens extras como a do autor se houver
            $table->date('approval_date')->nullable(); // '2020-03-16'
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
