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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string("VIN")->unique();
            $table->string("marca")->nullable(false);
            $table->string("modelo")->nullable(false);
            $table->integer("año")->nullable(false);
            $table->integer("cilindros")->nullable(false);
            $table->string("tipo")->nullable(false); //coupe, sedan, SUV, Furgoneta, camioneta, pick-up
            $table->integer("cant_puertas")->nullable(false);
            $table->string("estado")->nullable(false); //registrado, en proceso, nacionalizado/importado, problemas legales, no permitido
            $table->unsignedBigInteger("id_dueño")->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
