<?php

namespace App\Models;

use App\Models\Auto;
use App\Models\Cliente;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cotizaciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_cliente',
        'id_empleado',
        'id_auto',
        'fecha_cotizacion',
        'descripcion',
        'precio',
        'estado_cotizacion',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    public function auto()
    {
        return $this->belongsTo(Auto::class, 'id_auto');
    }
}
