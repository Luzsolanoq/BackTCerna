<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();  // Genera una columna `id` autoincremental
            $table->string('nombre', 50);  // Columna para el nombre del rol
            $table->timestamps();  // Genera las columnas `created_at` y `updated_at`
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');  // Elimina la tabla si la migración es revertida
    }
};
