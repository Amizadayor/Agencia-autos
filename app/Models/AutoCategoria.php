<?php

namespace App\Models;

use App\Models\Auto;
use App\Models\CategoriaAuto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoCategoria extends Model
{
    use HasFactory;

        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Auto_Categorias';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'autos_categorias';

    protected $fillable = [
        'id_auto',
        'id_categoria',
    ];

    public function auto()
    {
        return $this->belongsTo(Auto::class, 'id_auto');
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaAuto::class, 'id_categoria');
    }
}
