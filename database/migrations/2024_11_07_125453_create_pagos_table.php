<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_encomienda')->constrained('encomiendas')->onDelete('cascade');
            $table->foreignId('id_venta_pasaje')->constrained('ventas_pasajes')->onDelete('cascade');
            $table->decimal('monto', 10, 2);
            $table->string('metodo_pago', 50);
            $table->string('estado', 15)->nullable();
            $table->date('fecha_pago')->default(DB::raw('CURRENT_DATE')); // Solo la fecha actual
            $table->time('hora_pago')->default(DB::raw('CURRENT_TIME'));  // Solo la hora actual
            //$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagos');
    }
};
