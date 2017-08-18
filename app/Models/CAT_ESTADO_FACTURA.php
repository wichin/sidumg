<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CAT_ESTADO_FACTURA extends Model
{
    protected $table = 'CAT_ESTADO_FACTURA';
    public $timestamps = false;

    public function Factura()
    {
        return $this->hasMany('App\Models\TB_FACTURA','id_estado','id');
    }

    public function GetEstadoFactura($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','nombre')->get();
    }
}