<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skinUser extends Model
{
    use HasFactory;

    protected $table = 'skin_user';
    //especificar la llave primaria aunque por defecto laravel toma la llave primaria como el campo id
    protected $primaryKey = 'id';
    //especificar los nombres de las columnas de las tablas, no incluyan el id y el de created_at y updated_at
    protected $fillable = [
        'skin_id',
        'user_id'
    ];

}
