<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CAT_TIPO_DOCUMENTO extends Model
{
    protected $table = 'CAT_TIPO_DOCUMENTO';
    public $timestamps = false;

    public function Persona()
    {
        return $this->hasMany('App\Models\TB_PERSONA','id_tipo_documento','id');
    }

    public function GetTipoDocumento($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','nombre')->get();
    }
}