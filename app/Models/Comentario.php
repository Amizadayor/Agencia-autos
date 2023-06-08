<?php

namespace App\Models;

use App\Models\Auto;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comentarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_auto',
        'id_empleado',
        'fecha_comentario',
        'contenido_comentario',
    ];

    /**
     * Obtener el auto asociado al comentario.
     */
    public function auto()
    {
        return $this->belongsTo(Auto::class, 'id_auto');
    }

    /**
     * Obtener el empleado asociado al comentario.
     */
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
}
