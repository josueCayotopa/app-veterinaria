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
        Schema::table('medico_veterinarios', function(Blueprint $table){
            $table->string('telefono_emergencia')->nullable();
            $table->boolean('disponibilidad')->default(false);
            $table->string('tipo_contrato')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medico_veterinarios', function(Blueprint $table){
            $table->dropColumn('telefono_emergencia');
            $table->dropColumn('disponibilidad');
            $table->dropColumn('tipo_contrato');
        });
    }
};
