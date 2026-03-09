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
            $table->longText('base64_data'); // Para salvar as imagens em base64
            $table->string('alt_text')->nullable();
            $table->timestamps();

            // Garantir que a mesma key só existe uma vez por módulo
            $table->unique(['module_id', 'key']);
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
