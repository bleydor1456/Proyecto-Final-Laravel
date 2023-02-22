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
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre_modulo")->unique();
            $table->text("direccion")->nullable(false);
            $table->string("telefono", 10)->unique();
            $table->string("estado", 25)->nullable(false); //cerrado, abierto, en contruccion, cerrado temporal
            $table->bigInteger("capacidad")->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modulos');
    }
};
