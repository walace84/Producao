<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
     protected $fillable = ['name', 'referencia', 'logo','city_id', 'user_id'];

     // tras os detalhes da loja
     public function Detail()
     {
     	return $this->hasMany(Detail::class);
     }
}
