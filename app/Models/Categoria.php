<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria'; // Nombre de la tabla en la base de datos
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 
        'nombre',
    ];

    public function productos(){
        return $this->hasMany(Producto::class, 'id_categoria');
    }
}
