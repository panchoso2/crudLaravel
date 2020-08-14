<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['Rut', 'Nombre', 'Apellido', 'Email', 'FechaNacimiento', 'Password', 'Avatar'];
}
