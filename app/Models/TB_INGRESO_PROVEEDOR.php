<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TB_INGRESO_PROVEEDOR extends Model
{
    protected $table = 'TB_INGRESO_PROVEEDOR';
    public $timestamps = false;

    public function Proveedor()
    {
        return $this->belongsTo('App\Models\TB_PROVEEDOR','id_proveedor','id');
    }

    public function Local()
    {
        return $this->belongsTo('App\Models\TB_LOCAL','id_local','id');
    }

    public function Articulo()
    {
        return $this->belongsTo('App\Models\TB_ARTICULO','id_articulo','id');
    }

    public function Movimiento()
    {
        return $this->belongsTo('App\Models\TB_MOVIMIENTO_INVENTARIO','id_movimiento','id');
    }
    
    ## Transacciones
    
    public function InsertIngreso($data)
    {
        return $this->insert([
            'id_proveedor'  => $data['id_proveedor'],
            'id_local'      => $data['id_local'],
            'id_articulo'   => $data['id_articulo'],
            'precio_compra' => $data['precio_compra'],
            'id_movimiento' => $data['movimiento'] 
        ]);
    }
}