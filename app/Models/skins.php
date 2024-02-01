<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skins extends Model
{
    use HasFactory;
    //especificar el nombre de la tabla
    protected $table = 'skins';
    //especificar la llave primaria aunque por defecto laravel toma la llave primaria como el campo id
    protected $primaryKey = 'id';
    //especificar los nombres de las columnas de las tablas, no incluyan el id y el de created_at y updated_at
    protected $fillable = [
        'nombre',
        'precio',
        'imagen'
    ];

}
