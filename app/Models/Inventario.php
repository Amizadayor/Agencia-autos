<?php

namespace App\Models;

use App\Models\Auto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inventario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_auto',
        'cantidad_disponible',
    ];

    /**
     * Obtener el auto asociado al inventario.
     */
    public function auto()
    {
        return $this->belongsTo(Auto::class, 'id_auto');
    }
}
