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
        Schema::create('zona_de_riesgos', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombre');
            $table->boolean('activa')->default(true);
            $table->text('tipo');
            $table->text('descripcion')->nullable();
            $table->json('coordenadas');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zona_de_riesgos');
    }
};
