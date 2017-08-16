<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TB_MOVIMIENTO_LOCAL extends Model
{
    protected $table = 'TB_MOVIMIENTO_LOCAL';
    public $timestamps = false;

    public function LocalOrigen()
    {
        return $this->belongsTo('App\Models\TB_LOCAL','id_local_origen','id');
    }

    public function LocalDestino()
    {
        return $this->belongsTo('App\Models\TB_LOCAL','id_local_destino','id');
    }

    public function Articulo()
    {
        return $this->belongsTo('App\Models\TB_ARTICULO','id_articulo','id');
    }

    public function MovimientoInventario()
    {
        return $this->belongsTo('App\Models\TB_MOVIMIENTO_LOCAL','id_movimiento','id');
    }

    ## Transacciones

    public function InsertMovimientoLocal($data)
    {
        return $this->insert([
            'id_local_origen'   => $data['id_local_origen'],
            'id_local_destino'  => $data['id_local_destino'],
            'id_articulo'       => $data['id_articulo'],
            'id_movimiento'     => $data['movimiento']
        ]);
    }
}