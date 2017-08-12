<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CAT_ESTADO_USUARIO extends Model
{
    protected $table = 'CAT_ESTADO_USUARIO';
    public $timestamps = false;
    
    public function Usuario()
    {
        return $this->hasMany('App\Models\TB_USUARIO','id_estado','id');
    }
}