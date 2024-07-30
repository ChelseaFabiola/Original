<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    use HasFactory;
    //son los datos que va a almacenar del formulario.
    protected $fillable=[
        'nombre',
        'comentario',
        'puntuacion',
        'estatus'
    ];
}
