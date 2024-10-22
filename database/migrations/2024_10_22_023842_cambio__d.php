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
            $table->renameColumn('dni','numero_documento');
        });
    }

    /**s
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medico_veterinarios', function(Blueprint $table){
            $table->renameColumn('numero_documento', 'dni');
        });
    }
};
