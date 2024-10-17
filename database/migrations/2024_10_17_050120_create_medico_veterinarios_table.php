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
        Schema::create('medico_veterinarios', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento')->nullable();
            $table->string('dni')->unique();
            $table->string('nombres');
            $table->string('apellidos')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('direccion')->nullable();
            $table->string('numero_de_colegiatura')->nullable();
            $table->string('especializacion')->nullable();
            $table->string('universidad')->nullable();
            $table->string('profesion')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medico_veterinarios');
    }
};
