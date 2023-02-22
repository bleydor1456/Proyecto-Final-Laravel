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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string("nombre", 45)->nullable(false);
            $table->string("apellidos", 25)->nullable(false);
            $table->date("nac")->nullable(false);
            $table->string("curp")->unique();
            $table->string("RFC")->unique();
            $table->string("correo", 25)->nullable(true)->unique();
            $table->string("telefono", 10)->unique();
            $table->text("direccion")->nullable(false);
            $table->string("puesto_trabajo", 35)->nullable(false);
            $table->unsignedBigInteger("id_modulo")->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
