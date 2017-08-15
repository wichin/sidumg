<?php

namespace App\Models;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class CAT_PAIS extends Model
{
    protected $table = 'CAT_PAIS';
    public $timestamps = false;

    public function Empresa()
    {
        return $this->hasMany('App\Models\TB_EMPRESA','id_pais','id');
    }

    public function GetPais($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','nombre')->get();
    }
}