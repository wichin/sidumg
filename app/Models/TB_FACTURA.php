<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TB_FACTURA extends Model
{
    protected $table = 'TB_FACTURA';
    public $timestamps = false;
    
    public function FacturaDetalle()
    {
        return $this->hasMany('App\Models\TB_FACTURA_DETALLE','id_factura','id');
    }
    
    public function Cliente()
    {
        return $this->belongsTo('App\Models\TB_CLIENTE','id_cliente','id');
    }
    
    public function TipoCobro()
    {
        return $this->belongsTo('App\Models\CAT_TIPO_COBRO','id_tipo_cobro','id');
    }
    
    public function Estado()
    {
        return $this->belongsTo('App\Models\CAT_ESTADO_FACTURA','id_estado','id');
    }

    public function Autorizacion()
    {
        return $this->belongsTo('App\Models\TB_AUTORIZACION_FACTURA','id_autorizacion','id');
    }
}