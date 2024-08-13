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
        Schema::create('tb_estrategia_wms_horario_prioridade', function (Blueprint $table) {
            $table->id('cd_estrategia_wms_horario_prioridade'); 
            $table->foreignId('cd_estrategia_wms')
                  ->constrained('tb_estrategia_wms', 'cd_estrategia_wms')
                  ->onDelete('cascade');
            $table->string('ds_horario_inicio');
            $table->string('ds_horario_final'); 
            $table->integer('nr_prioridade');
            $table->timestamp('dt_registro')->useCurrent();
            $table->timestamp('dt_modificado')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_estrategia_wms_horario_prioridade');
    }
};
