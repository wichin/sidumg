<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TB_CUENTA_DETALLE extends Model
{
    protected $table = 'TB_CUENTA_DETALLE';
    public $timestamps = false;

    public function CuentaAbono()
    {
        return $this->hasMany('App\Models\TB_CUENTA_ABONO','id_cuenta_detalle','id');
    }

    public function Cuenta()
    {
        return $this->belongsTo('App\Models\TB_CUENTA','id_cuenta','id');
    }

    public function Factura()
    {
        return $this->belongsTo('App\Models\TB_FACTURA','id_factura','id');
    }
}