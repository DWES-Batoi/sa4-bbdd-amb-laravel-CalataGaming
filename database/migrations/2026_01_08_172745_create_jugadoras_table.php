<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Aquí definimos las columnas de la tabla.
     */
    public function up(): void
    {
        Schema::create('jugadoras', function (Blueprint $table) {
            $table->id();
            // Esta línea crea la relación con la tabla 'equips'
            $table->foreignId('equip_id')->constrained('equips')->onDelete('cascade');
            
            $table->string('nom');
            $table->date('data_naixement');
            $table->integer('dorsal');
            $table->string('foto')->nullable(); // nullable significa que puede estar vacío
            $table->timestamps(); // Crea las columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     * Esto borra la tabla si hacemos un rollback.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadoras');
    }
};