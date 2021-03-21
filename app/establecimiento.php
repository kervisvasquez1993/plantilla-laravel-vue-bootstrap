<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class establecimiento extends Model
{
    protected $table = 'establecimientos';
    protected $fillable = [
        'nombre',
        'categoria_id',
        'imagen_principal',
        'direccion',
        'colonia',
        'lat',
        'lng',
        'telefono',
        'descripcion',
        'apertura',
        'cierre',
        'uuid'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'categoria_id');
    }
}
