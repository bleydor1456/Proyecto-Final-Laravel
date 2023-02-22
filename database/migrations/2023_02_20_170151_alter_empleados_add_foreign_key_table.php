<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('empleados', function(Blueprint $table) {
            $table->foreign('id_modulo')->references('id')->on('modulos');
               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleados', function(Blueprint $table) {
            $table->dropForeign('empleados_id_modulo_foreign');
                
        });
    }
};
