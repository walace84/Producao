<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\City;

class Admin extends Authenticatable
{
    use Notifiable;

    /* está definido no guard em auth.php na pasta config,para identificar que é parte adiministrativa */
    protected $guard = 'admin';

    /**
     * Campos que podem ser preenchidos.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // Chama a tabela de cidades.
    public function City()
    {
        return $this->hasMany(City::class);
    }
}
