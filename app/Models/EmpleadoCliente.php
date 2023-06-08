<?php

namespace App\Models;

use App\Models\Empleado;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoCliente extends Model
{
    use HasFactory;

    protected $table = 'empleados_clientes';

    protected $fillable = [
        'id_empleado',
        'id_cliente',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
