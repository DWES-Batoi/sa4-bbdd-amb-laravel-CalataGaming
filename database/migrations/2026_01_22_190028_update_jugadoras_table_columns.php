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
        Schema::table('jugadoras', function (Blueprint $table) {
            $table->string('posicio')->nullable()->after('nom');
            $table->integer('edat')->nullable()->after('dorsal');
            
            // Hacemos que los viejos sean opcionales para evitar el error 1364
            $table->date('data_naixement')->nullable()->change();
            $table->string('foto')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jugadoras', function (Blueprint $table) {
            $table->dropColumn(['posicio', 'edat']);
            // $table->date('data_naixement');
            // $table->string('foto')->nullable();
        });
    }
};
