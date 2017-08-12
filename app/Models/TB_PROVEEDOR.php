<?php

namespace App\Models;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class TB_PROVEEDOR extends Model
{
    protected $table = 'TB_PROVEEDOR';
    public $timestamps = false;

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