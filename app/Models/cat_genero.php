<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CAT_GENERO extends Model
{
    protected $table = 'CAT_GENERO';
    public $timestamps = false;

    public function Persona()
    {
        return $this->hasMany('App\Models\TB_PERSONA','id_genero','id');
    }
    
    public function Articulo()
    {
        return $this->hasMany('App\Models\TB_ARTICULO','id_genero','id');
    }

    public function GetGenero($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','nombre')->get();
    }
}