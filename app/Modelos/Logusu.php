<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Logusu extends Model
{
    public $table = 'logusu'; //para usar nome diferente da tabela
    public $timestamps = false;
    
    protected $fillable = [
        'users_id',
        'tabela',
        'acao',
        'ip_cliente',
        'data'
    ];

    public function eventos()       {return $this->hasMany('App\Modelos\Evento');}
    public function usuarios()      {return $this->hasMany('App\Users');}
}
