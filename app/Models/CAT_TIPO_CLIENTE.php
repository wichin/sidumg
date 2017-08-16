<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CAT_TIPO_CLIENTE extends Model
{
    protected $table = 'CAT_TIPO_CLIENTE';
    public $timestamps = false;

    public function Cliente()
    {
        return $this->hasMany('App\Models\TB_CLIENTE','id_tipo_cliente','id');
    }

    public function GetTipoCliente($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','nombre')->get();
    }
}