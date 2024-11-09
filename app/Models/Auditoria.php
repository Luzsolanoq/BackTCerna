<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $table = 'auditoria';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'tabla', 'operacion', 'id_registro', 'usuario_id', 'fecha','hora', 'detalles'
    ];

    // Relación con usuario (una auditoría pertenece a un usuario)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
