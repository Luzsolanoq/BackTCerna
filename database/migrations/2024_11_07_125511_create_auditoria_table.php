<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('auditoria', function (Blueprint $table) {
            $table->id();
            $table->string('tabla');
            $table->string('operacion');
            $table->string('id_registro');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->date('fecha')->default(DB::raw('CURRENT_DATE')); // Solo la fecha actual
            $table->time('hora')->default(DB::raw('CURRENT_TIME'));  // Solo la hora actual
            $table->text('detalles')->nullable();
            //$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('auditoria');
    }
};
