<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'referencia', 'admin_id'];

    // pega as lojas da cidade
    public function Stores()
    {
    	return $this->hasMany(Store::class);
    }
}
