<?php

namespace App\Models;

use App\Models\Auto;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Mantenimiento;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

            /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ventas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_auto',
        'id_cliente',
        'id_empleado',
        'id_mantenimiento',
        'fecha_venta',
        'precio_venta',
    ];

    /**
     * Obtener el auto asociado a la venta.
     */
    public function auto()
    {
        return $this->belongsTo(Auto::class, 'id_auto');
    }

    /**
     * Obtener el cliente asociado a la venta.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    /**
     * Obtener el empleado asociado a la venta.
     */
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    /**
     * Obtener el mantenimiento asociado a la venta.
     */
    public function mantenimiento()
    {
        return $this->belongsTo(Mantenimiento::class, 'id_mantenimiento');
    }
}
