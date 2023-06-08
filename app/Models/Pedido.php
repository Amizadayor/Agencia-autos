<?php

namespace App\Models;

use App\Models\Auto;
use App\Models\Cliente;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Pedidos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_auto',
        'id_cliente',
        'id_empleado',
        'fecha_pedido',
        'fecha_entrega',
        'total',
        'estado_pedido',
    ];

    /**
     * Get the auto associated with the pedido.
     */
    public function auto()
    {
        return $this->belongsTo(Auto::class, 'id_auto');
    }

    /**
     * Get the cliente associated with the pedido.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    /**
     * Get the empleado associated with the pedido.
     */
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
}
