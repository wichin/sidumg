<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TB_AUTORIZACION_FACTURA extends Model
{
    protected $table = 'TB_AUTORIZACION_FACTURA';
    public $timestamps = false;
    
    public function Local()
    {
        return $this->belongsTo('App\Models\TB_LOCAL','id_local','id');
    }
    
    ##Transacciones
    
    public function ValidaAutorizacionActiva($idLocal)
    {
        return $this->where('id_local',$idLocal)
            ->where('estado',1)
            ->get();
    }
    
    public function SetAutorizacion($data)
    {
        return $this->insert($data);
    }
}