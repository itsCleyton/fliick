<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'users_id',
        'tabela',
        'acao',
        'ip_cliente',
        'data'
    ];

    public function usuario()   {return $this->hasOne('App\User');}
}
