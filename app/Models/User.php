<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Empleado;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

        /**
     * Get the Cliente record associated with the User.
     */
    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    /**
     * Get the Empleado record associated with the User.
     */
    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }
}
