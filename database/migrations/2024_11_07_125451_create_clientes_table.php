<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tipo_documento')->constrained('tipo_documento')->onDelete('cascade');
            $table->string('numero_documento', 15)->unique();
            $table->string('nombre', 100);
            $table->string('razon_social', 150)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('direccion', 150)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
