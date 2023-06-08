<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaAuto extends Model
{
    use HasFactory;

    protected $table = 'Categoria_autos';

    protected $fillable = [
        'nombre_categoria',
    ];

    public $timestamps = true;
}