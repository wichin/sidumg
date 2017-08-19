<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CAT_NACIONALIDAD extends Model
{
    protected $table = 'CAT_NACIONALIDAD';
    public $timestamps = false;

    public function Persona()
    {
        return $this->hasMany('App\Models\TB_PERSONA','id_nacionalidad','id');
    }

    public function GetNacionalidad($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','nombre')->get();
    }
}