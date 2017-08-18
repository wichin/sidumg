<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TB_CUENTA extends Model
{
    protected $table = 'TB_CUENTA';
    public $timestamps = false;

    public function CuentaDetalle()
    {
        return $this->hasMany('App\Models\TB_CUENTA_DETALLE','id_cuenta','id');
    }
    
    public function Cliente()
    {
        return $this->belongsTo('App\Models\TB_CLIENTE','id_cliente','id');
    }
}