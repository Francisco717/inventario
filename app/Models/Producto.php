<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos'; // Nombre de la tabla en la base de datos
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 
        'nombre',
        'cantidad',
        'precio',
        'id_categoria',
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
