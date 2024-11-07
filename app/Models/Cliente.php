<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_tipo_documento', 'numero_documento', 'nombre', 'razon_social', 'telefono', 'direccion'
    ];

    // Relación con tipo_documento (un cliente tiene un tipo de documento)
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'id_tipo_documento');
    }

    // Relación con encomiendas (un cliente puede ser remitente o destinatario o empresa)
    public function encomiendasRemitidas()
    {
        return $this->hasMany(Encomienda::class, 'id_remitente');
    }

    public function encomiendasDestinadas()
    {
        return $this->hasMany(Encomienda::class, 'id_destinatario');
    }

    public function encomiendasEmpresas()
    {
        return $this->hasMany(Encomienda::class, 'id_empresa');
    }

    // Relación con ventas_pasajes (un cliente (persona o empresa) puede tener muchas ventas de pasajes)
    public function ventasPasajes()
    {
        return $this->hasMany(VentaPasaje::class, 'id_cliente');
    }

    public function ventasEmpresas()
    {
        return $this->hasMany(VentaPasaje::class, 'id_empresa');
    }

}
