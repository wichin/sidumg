<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TB_ROL extends Model
{
    protected $table = 'TB_ROL';
    public $timestamps = false;

    public function Usuario()
    {
        return $this->hasMany('App\Models\TB_USUARIO','id_rol','id');
    }

    public function AccesoRol()
    {
        return $this->hasMany('App\Models\TB_ACCESO_ROL','id_rol','id');
    }

    public function GetRol($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','nombre')->get();
    }
}