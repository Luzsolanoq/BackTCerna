<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermiso extends Model
{
    protected $table = 'roles_permisos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_rol', 'id_permiso'
    ];

    // Relación con Rol
    public function rol()
    {
        return $this->belongsTo(Role::class, 'id_rol');
    }

    // Relación con Permiso
    public function permiso()
    {
        return $this->belongsTo(Permiso::class, 'id_permiso');
    }
}
