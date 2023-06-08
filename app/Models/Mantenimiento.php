<?php

namespace App\Models;

use App\Models\Auto;
use App\Models\Cliente;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

            /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Mantenimiento';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_auto',
        'id_cliente',
        'id_empleado',
        'fecha_mantenimiento',
        'descripcion',
        'costo_mantenimiento',
        'estado_mantenimiento',
    ];

    /**
     * Obtener el auto asociado al mantenimiento.
     */
    public function auto()
    {
        return $this->belongsTo(Auto::class, 'id_auto');
    }

    /**
     * Obtener el cliente asociado al mantenimiento.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    /**
     * Obtener el empleado asociado al mantenimiento.
     */
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
}
