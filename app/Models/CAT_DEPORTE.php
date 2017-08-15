<?php

namespace App\Models;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class CAT_DEPORTE extends Model
{
    protected $table = 'CAT_DEPORTE';
    public $timestamps = false;

    public function Articulo()
    {
        return $this->hasMany('App\Models\TB_ARTICULO','id_deporte','id');
    }

    public function GetDeporte($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','nombre')->get();
    }
}