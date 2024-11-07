<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permisos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nombre', 'descripcion'
    ];

    // Relación con roles (un permiso tiene muchos roles a través de roles_permisos)
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permisos', 'id_permiso', 'id_rol');
    }
}
