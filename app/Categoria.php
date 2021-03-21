<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // leer las ruta por slug

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function establecimientos()
    {
        return $this->hasMany(establecimiento::class);
    }
}
