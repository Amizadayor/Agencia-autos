<?php

namespace App\Models;

use App\Models\CategoriaAuto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;

    protected $table = 'autos';

    protected $fillable = [
        'id_categoria',
        'marca',
        'modelo',
        'anio',
        'color',
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaAuto::class, 'id_categoria');
    }
}
