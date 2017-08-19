<?php

namespace App\Models;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class TB_EMPRESA extends Model
{
    protected $table = 'TB_EMPRESA';
    public $timestamps = false;

    public function Local()
    {
        return $this->hasMany('App\Models\TB_LOCAL','id_empresa','id');
    }

    public function Metas()
    {
        return $this->hasMany('App\Models\TB_METAS','id_empresa','id');
    }

    public function Pais()
    {
        return $this->belongsTo('App\Models\CAT_PAIS','id_pais','id');
    }

    public function GetEmpresa($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })
            ->with('Pais')
            ->select('id','nombre','id_pais')->get();
    }
}