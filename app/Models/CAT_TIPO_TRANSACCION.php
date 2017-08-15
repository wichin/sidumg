<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CAT_TIPO_TRANSACCION extends Model
{
    protected $table = 'CAT_TIPO_TRANSACCION';
    public $timestamps = false;
    
    public function MovimientoInventario()
    {
        return $this->hasMany('App\Models\TB_MOVIMIENTO_INVENTARIO','id_transaccion','id');
    }

    public function GetTipoTransaccion($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','nombre')->get();
    }
}