<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acogidas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('propietario_id')->constrained('propietarios'); 

            $table->foreignId('mascota_id'); 
            $table->foreign('mascota_id')->references('id')->on('mascotas'); 

            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acogidas');
    }
};
