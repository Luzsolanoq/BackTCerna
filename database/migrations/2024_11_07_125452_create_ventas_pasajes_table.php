<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ventas_pasajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_viaje')->constrained('viajes')->onDelete('cascade');
            $table->foreignId('id_cliente')->constrained('clientes')->onDelete('cascade');
            $table->decimal('costo', 10, 2);
            $table->date('fecha_venta')->default(DB::raw('CURRENT_DATE')); // Solo la fecha actual
            $table->time('hora_venta')->default(DB::raw('CURRENT_TIME'));  // Solo la hora actual
            $table->string('estado', 15)->nullable();
            $table->foreignId('id_empresa')->nullable()->constrained('clientes')->onDelete('set null');
            //$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ventas_pasajes');
    }
};
