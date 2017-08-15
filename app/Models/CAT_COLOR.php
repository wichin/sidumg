<?php

namespace App\Models;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class CAT_COLOR extends Model
{
    protected $table = 'CAT_COLOR';
    public $timestamps = false;

    public function Articulo()
    {
        return $this->hasMany('App\Models\TB_ARTICULO','id_color','id');
    }

    public function GetColor($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','nombre')->get();
    }
}