<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nombre', 'dni', 'celular', 'id_rol', 'contraseña'
    ];

    // Relación con el rol (un usuario pertenece a un rol)
    public function rol()
    {
        return $this->belongsTo(Role::class, 'id_rol');
    }

    // Relación con viajes (un chofer puede tener muchos viajes)
    public function viajes()
    {
        return $this->hasMany(Viaje::class, 'id_chofer');
    }

    // Relación con auditoría (un usuario tiene muchas auditorías)
    public function auditorias()
    {
        return $this->hasMany(Auditoria::class, 'usuario_id');
    }
}
