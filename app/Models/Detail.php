<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Detail extends Model
{
     protected $fillable = [
     			'oferta',
     			'detalhes',
     			'regras',
     			'desconto',
     			'valor',
     			'newvalor',
     			'telefone',
     			'whatsapp',
     			'endereco',
     			'email',
                    'site',
     			'image',
     			'store_id'
     	];
}