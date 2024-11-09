<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_partida');
            $table->time('hora_partida');
            $table->date('fecha_llegada');
            $table->time('hora_llegada');
            $table->foreignId('id_chofer')->nullable()->constrained('usuarios')->onDelete('set null');  // Añadir nullable()
            $table->foreignId('id_vehiculo')->nullable()->constrained('vehiculos')->onDelete('set null');  // Añadir nullable()
            $table->string('estado', 15)->nullable();
            //$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('viajes');
    }
};
