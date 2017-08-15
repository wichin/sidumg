<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CAT_TIPO_LOCAL extends Model
{
    protected $table = 'CAT_TIPO_LOCAL';
    public $timestamps = false;

    public function Local()
    {
        return $this->hasMany('App\Models\TB_LOCAL','id_tipo_local','id');
    }

    public function GetTipoLocal($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','nombre')->get();
    }
}