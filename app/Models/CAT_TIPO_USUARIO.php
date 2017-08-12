<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CAT_TIPO_USUARIO extends Model
{
    protected $table = 'CAT_TIPO_USUARIO';
    public $timestamps = false;

    public function Usuario()
    {
        return $this->hasMany('App\Models\TB_USUARIO','id_tipo_usuario','id');
    }

    public function GetTipoUsuario($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','nombre')->get();
    }
}