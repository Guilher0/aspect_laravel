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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained()->onDelete('cascade');
            $table->string('key'); // e.g., 'hero_background', 'partner_logo_1'
            $table->string('path'); // Para salvar as imagens no storage
            $table->string('alt_text')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Garantir que a mesma key só existe uma vez por módulo, considerando softdeletes
            $table->unique(['module_id', 'key', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
