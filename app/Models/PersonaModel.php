<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonaModel extends Model
{
    //
    use HasFactory;
    protected $table = 'personas';
    protected $fillable = [
        'nombre',
        'apellido',
        'ci',
        'nit'
    ];
}
