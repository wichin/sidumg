<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TB_AUTORIZACION_FACTURA extends Model
{
    protected $table = 'TB_AUTORIZACION_FACTURA';
    public $timestamps = false;
    
    public function Factura()
    {
        return $this->hasMany('App\Models\TB_FACTURA','id_autorizacion','id');    
    }
    
    public function Local()
    {
        return $this->belongsTo('App\Models\TB_LOCAL','id_local','id');
    }
    
    ##Transacciones
    
    public function ValidaAutorizacionActiva($idLocal)
    {
        return $this->where('id_local',$idLocal)
            ->where('estado',1)
            ->with('Local.Empresa')
            ->get();
    }
    
    public function SetAutorizacion($data)
    {
        return $this->insert($data);
    }

    public function UpdateAutorizacion($id, $valor)
    {
        return $this->where('id',$id)
            ->update([
                'valor_actual' => $valor
            ]);
    }
    
    public function InactivarAutorizacion($id)
    {
        return $this->where('id',$id)
            ->update([
                'estado' => 2
            ]);
    }
    
    

    public function GetCorrelativo($idLocal)
    {
        $dataAutorizacion = $this->ValidaAutorizacionActiva($idLocal);
        if(isset($dataAutorizacion)&&count($dataAutorizacion)>0)
        {
            $idAutorizacion = $dataAutorizacion[0]->id;
            $valorActual    = $dataAutorizacion[0]->valor_actual;
            $valorFinal     = $dataAutorizacion[0]->valor_final;
            
            if($valorActual<=$valorFinal)
            {
                if($valorActual==$valorFinal)
                {
                    $this->InactivarAutorizacion($idAutorizacion);
                    return ['ESTADO'=>'OK','MENSAJE'=>'Se inactivo la Autorizacion.','DATA'=>$dataAutorizacion];
                }
                else
                {
                    if($this->UpdateAutorizacion($idAutorizacion,($valorActual+1)))
                    {
                        return ['ESTADO'=>'OK','DATA'=>$dataAutorizacion];
                    }
                    else
                    {
                        return ['ESTADO'=>'ERROR','MENSAJE'=>'No fue posible generar correlativo para la Factura.'];
                    }
                }


            }
            else
            {
                return ['ESTADO'=>'ERROR','MENSAJE'=>'El numero de correlativo no es válido.'];
            }
        }
        else
        {
            return ['ESTADO'=>'ERROR','MENSAJE'=>'No existe resolución válida para generar la Factura.'];
        }
    }
}