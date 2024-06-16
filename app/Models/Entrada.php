<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    protected $table = 'entradas'; // Nombre de la tabla en la base de datos
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 
        'fecha',
        'id_producto',
    ];
}
