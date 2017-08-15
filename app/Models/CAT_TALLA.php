<?php

namespace App\Models;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class CAT_TALLA extends Model
{
    protected $table = 'CAT_TALLA';
    public $timestamps = false;

    public function Articulo()
    {
        return $this->hasMany('App\Models\TB_ARTICULO','id_talla','id');
    }

    public function GetTalla($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','nombre')->get();
    }
}