<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TB_CUENTA_ABONO extends Model
{
    protected $table = 'TB_CUENTA_ABONO';
    public $timestamps = false;

    public function CuentaAbono()
    {
        return $this->belongsTo('App\Models\TB_CUENTA_ABONO','id_cuenta_detalle','id');
    }
}