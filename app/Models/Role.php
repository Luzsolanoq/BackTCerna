<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];

     // Relación con usuarios (un rol tiene muchos usuarios)
     public function usuarios()
     {
         return $this->hasMany(Usuario::class, 'id_rol');
     }
 
     // Relación con permisos (un rol tiene muchos permisos a través de roles_permisos)
     public function permisos()
     {
         return $this->belongsToMany(Permiso::class, 'roles_permisos', 'id_rol', 'id_permiso');
     }
}
