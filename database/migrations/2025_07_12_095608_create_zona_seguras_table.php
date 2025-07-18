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
        Schema::create('zona_seguras', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->boolean('activa')->default(true);
            $table->text('tipo');
            $table->text('descripcion')->nullable();
            $table->decimal('latitud', 10, 7);     
            $table->decimal('longitud', 10, 7);     
            $table->integer('radio_metros')->default(50);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zona_seguras');
    }
};
