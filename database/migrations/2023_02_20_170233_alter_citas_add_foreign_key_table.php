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
        //
        Schema::table("citas", function(Blueprint $uzi){
            /*
            $table->unsignedBigInteger("id_usuario_cita")->unique();
            $table->unsignedBigInteger("id_auto_citado")->unique();
            $table->unsignedBigInteger("id_modulo_cita")->nullable(false);
            */
            
            $uzi->foreign("id_usuario_cita")->references("id")->on("usuarios");
            $uzi->foreign("id_vehiculo_citado")->references("id")->on("vehiculos");
            $uzi->foreign("id_modulo_cita")->references("id")->on("modulos");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table("citas", function(Blueprint $a) {
            $a->dropForeign("citas_id_usuario_cita_foreign");
            $a->dropForeign("citas_id_vehiculo_citado_foreign");
            $a->dropForeign("citas_id_modulo_cita_foreign");
        });
    }
};
