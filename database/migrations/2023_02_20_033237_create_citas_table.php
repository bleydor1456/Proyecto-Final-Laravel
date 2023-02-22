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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->date("fecha_registro")->nullable(false);
            $table->date("fecha_cita")->nullable(false);
            $table->unsignedBigInteger("id_usuario_cita")->nullable(true);
            $table->unsignedBigInteger("id_vehiculo_citado")->nullable(true);
            $table->unsignedBigInteger("id_modulo_cita")->nullable(true);
            $table->string("estado", 25)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
