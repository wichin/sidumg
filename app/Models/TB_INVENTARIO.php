<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TB_INVENTARIO extends Model
{
    protected $table = 'TB_INVENTARIO';
    public $timestamps = false;

    public function Local()
    {
        return $this->belongsTo('App\Models\TB_LOCAL','id_local','id');
    }
    
    public function Articulo()
    {
        return $this->belongsTo('App\Models\TB_ARTICULO','id_articulo','id');
    }

    ## Transacciones

    public function ValidaInventario($data, $local)
    {
        return $this->where('id_local',$local)
            ->where('id_articulo',$data['id_articulo'])
            ->get();
    }

    public function ValidaExistencias($data, $local)
    {
        return $this->where('id_local',$local)
            ->where('id_articulo',$data['id_articulo'])
            ->where('cantidad','>=',$data['cantidad'])
            ->with('Articulo')
            ->get();
    }

    public function UpdateInventario($data, $local, $operacion)
    {
        return $this->where('id_local',$local)
            ->where('id_articulo',$data['id_articulo'])
            ->update([
                'cantidad'              => DB::raw( 'cantidad '.$operacion.' '.$data['cantidad']),
                'ultima_modificacion'   => $data['fecha']
            ]);
    }

    public function InsertInventario($data,$local)
    {
        return $this->insert([
            'id_local'              => $local,
            'id_articulo'           => $data['id_articulo'],
            'cantidad'              => $data['cantidad'],
            'ultima_modificacion'   => $data['fecha']
        ]);
    }
    
    public function TransaccionProveedor($data)
    {
        $validacion = $this->ValidaInventario($data, $data['id_local']);
        
        if(isset($validacion)&&count($validacion)>0)
        {
            return $this->UpdateInventario($data,$data['id_local'],'+');
        }
        else
        {
            return $this->InsertInventario($data, $data['id_local']);
        }
    }

    public function TransaccionTraslado($data)
    {
        $validaExistencia = $this->ValidaExistencias($data, $data['id_local_origen']);

        if(isset($validaExistencia)&&count($validaExistencia)>0)
        {
            if($this->UpdateInventario($data,$data['id_local_origen'],'-'))
            {
                $validacion = $this->ValidaInventario($data, $data['id_local_destino']);

                if(isset($validacion)&&count($validacion)>0)
                {
                    return $this->UpdateInventario($data,$data['id_local_destino'],'+');
                }
                else
                {
                    return $this->InsertInventario($data, $data['id_local_destino']);
                }
            }
            else
                return false;
        }
        else
            return false;
    }

    public function TransaccionFactura($data)
    {
        $validaExistencia = $this->ValidaExistencias($data, $data['id_local']);        

        if(isset($validaExistencia)&&count($validaExistencia)>0)
        {
            $descripcion = $validaExistencia[0]->Articulo->descripcion;
            $precio_venta = $validaExistencia[0]->Articulo->precio_venta;

            if($this->UpdateInventario($data,$data['id_local'],'-'))
            {
                return ['ESTADO'=>'OK','DESCRIPCION'=>$descripcion,'PRECIO_VENTA'=>$precio_venta];
            }
            else
            {
                return ['ESTADO'=>'ERROR'];
            }
        }
        else
        {
            return ['ESTADO'=>'ERROR'];
        }
    }
}