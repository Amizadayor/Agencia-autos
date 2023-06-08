<?php

namespace App\Models;

use App\Models\Comentario;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoComentario extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'empleados_comentarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_empleado',
        'id_comentario',
    ];

    /**
     * Get the empleado associated with the comentario.
     */
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    /**
     * Get the comentario associated with the empleado.
     */
    public function comentario()
    {
        return $this->belongsTo(Comentario::class, 'id_comentario');
    }
}
