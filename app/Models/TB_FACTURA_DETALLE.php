<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TB_FACTURA_DETALLE extends Model
{
    protected $table = 'TB_FACTURA_DETALLE';
    public $timestamps = false;

    public function Factura()
    {
        return $this->belongsTo('App\Models\TB_FACTURA','id_factura','id');
    }

    public function Articulo()
    {
        return $this->belongsTo('App\Models\TB_ARTICULO','id_articulo','id');
    }

    public function MovimentoInventario()
    {
        return $this->belongsTo('App\Models\TB_MOVIMIENTO_INVENTARIO','id_movimiento','id');
    }
}
