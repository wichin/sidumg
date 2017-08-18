<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CAT_TIPO_COBRO extends Model
{
    protected $table = 'CAT_TIPO_COBRO';
    public $timestamps = false;

    public function Factura()
    {
        return $this->hasMany('App\Models\TB_FACTURA','id_tipo_cobro','id');
    }

    public function GetTipoCobro($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','nombre')->get();
    }
}