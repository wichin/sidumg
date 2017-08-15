<?php

namespace App\Models;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class TB_PROVEEDOR extends Model
{
    protected $table = 'TB_PROVEEDOR';
    public $timestamps = false;

    public function Articulo()
    {
        return $this->hasMany('App\Models\TB_ARTICULO','id_proveedor','id');
    }
    
    public function IngresoProveedor()
    {
        return $this->hasMany('App\Models\TB_INGRESO_PROVEEDOR','id_proveedor','id');
    }

    public function GetProveedor($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','razon_social','nombre_comercial')->get();
    }
}