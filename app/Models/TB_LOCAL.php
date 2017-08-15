<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TB_LOCAL extends Model
{
    protected $table = 'TB_LOCAL';
    public $timestamps = false;
    
    public function Usuario()
    {
        return $this->hasMany('App\Models\TB_USUARIO','id_local','id');
    }

    public function IngresoProveedor()
    {
        return $this->hasMany('App\Models\TB_INGRESO_PROVEEDOR','id_local','id');
    }
    
    public function Inventario()
    {
        return $this->hasMany('App\Models\TB_INVENTARIO','id_local','id');
    }

    public function Empresa()
    {
        return $this->belongsTo('App\Models\TB_EMPRESA','id_empresa','id');
    }

    public function TipoLocal()
    {
        return $this->belongsTo('App\Models\CAT_TIPO_LOCAL','id_tipo_local','id');
    }
    

    public function GetLocalAll($estado = null)
    {
        return $this->where(function ($sql) use($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->with('Empresa','TipoLocal')->orderBy('nombre')->get();
    }

    public function GetLocalTipo($tipo = null)
    {
        return $this->where(function ($sql) use($tipo){
            if(isset($tipo))
            {
                $sql->where('id_tipo_local',$tipo);
            }
        })->with('Empresa','TipoLocal')->orderBy('nombre')->get();
    }

    public function SetLocal($data)
    {
        return $this->insert($data);
    }
}