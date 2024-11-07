<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipo_documento';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nombre', 'descripcion'
    ];

     // Relación con clientes (un tipo de documento tiene muchos clientes)
     public function clientes()
     {
         return $this->hasMany(Cliente::class, 'id_tipo_documento');
     }
}
