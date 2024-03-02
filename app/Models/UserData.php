<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'user_data';
    protected $fillable = [
        'nombres',
        'apellidos',
        'genero',
        'edad',
        'city',
        'fecha_cumpleaños',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
