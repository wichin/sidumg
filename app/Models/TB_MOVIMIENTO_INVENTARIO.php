<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TB_MOVIMIENTO_INVENTARIO extends Model
{
    protected $table = 'TB_MOVIMIENTO_INVENTARIO';
    public $timestamps = false;

    public function IngresoProveedor()
    {
        return $this->hasMany('App\Models\TB_INGRESO_PROVEEDOR','id_movimiento','id');
    }
    
    public function MovimientoLocal()
    {
        return $this->hasMany('App\Models\TB_MOVIMIENTO_LOCAL','id_movimiento','id');
    }
    
    public function FacturaDetalle()
    {
        return $this->hasMany('App\Models\TB_FACTURA_DETALLE','id_movimiento','id');
    }

    public function TipoTransaccion()
    {
        return $this->belongsTo('App\Models\CAT_TIPO_TRANSACCION','id_transaccion','id');
    }

    public function Articulo()
    {
        return $this->belongsTo('App\Models\TB_ARTICULO','id_articulo','id');
    }
    
    public function Usuario()
    {
        return $this->belongsTo('App\Models\TB_USUARIO','id_usuario','id');
    }

    public function SetMovimiento($data)
    {
        return $this->insertGetId([
            'id_transaccion'    => $data['id_transaccion'],
            'id_articulo'       => $data['id_articulo'],
            'cantidad'          => $data['cantidad'],
            'fecha'             => $data['fecha'],
            'id_usuario'        => $data['id_usuario']
        ]);
    }

    public function TransaccionIngresoProveedor($data)
    {
        DB::beginTransaction();

        $validaMov  = [];
        $validaProv = [];
        $validaInv  = [];
        
        foreach ($data as $d => $dt)
        {
            $idMov = $this->SetMovimiento($dt);

            $validaMov[$d]  = $idMov?1:0;
            $data[$d]['movimiento'] = $idMov;
        }

        if(!in_array(0,$validaMov))
        {
            foreach ($data as $d => $dt)
            {
                $IngresoProveedor = new TB_INGRESO_PROVEEDOR();

                $insertProv = $IngresoProveedor->InsertIngreso($dt);

                $validaProv[$d] = $insertProv?1:0;
            }
            
            if(!in_array(0,$validaProv))
            {
                foreach ($data as $d => $dt)
                {
                    $Inventario = new TB_INVENTARIO();

                    $insertInv = $Inventario->TransaccionProveedor($dt);

                    $validaInv[$d] = $insertInv?1:0;
                }

                if(!in_array(0,$validaInv))
                {
                    $info = ['titulo'=>'PROCESO EXITOSO','msg'=>'El ingreso de proveedor fue realizado exitosamente','class'=>'info'];
                    Session::flash('mensaje',$info);
                    DB::commit();
                }
                else
                {
                    $info = ['titulo'=>'PROCESO INCOMPLETO','msg'=>'No fue posible registrar la Actualización de Inventario','class'=>'danger'];
                    Session::flash('mensaje',$info);
                    DB::rollback();
                }
            }
            else
            {
                $info = ['titulo'=>'PROCESO INCOMPLETO','msg'=>'No fue posible registrar el Ingreso de Proveedor','class'=>'danger'];
                Session::flash('mensaje',$info);
                DB::rollback();
            }
        }
        else
        {
            $info = ['titulo'=>'PROCESO INCOMPLETO','msg'=>'No fue posible registrar el Movimiento de Artículos','class'=>'danger'];
            Session::flash('mensaje',$info);
            DB::rollback();
        }

        return true;
    }

    public function TransaccionTrasladoArticulo($data)
    {
        DB::beginTransaction();

        $validaMov  = [];
        $validaTras = [];
        $validaInv  = [];

        foreach ($data as $d => $dt)
        {
            $idMov = $this->SetMovimiento($dt);

            $validaMov[$d]  = $idMov?1:0;
            $data[$d]['movimiento'] = $idMov;
        }

        if(!in_array(0,$validaMov))
        {
            foreach ($data as $d => $dt)
            {
                $TrasladoArticulo = new TB_MOVIMIENTO_LOCAL();

                $insertTras = $TrasladoArticulo->InsertMovimientoLocal($dt);

                $validaTras[$d] = $insertTras?1:0;
            }

            if(!in_array(0,$validaTras))
            {
                foreach ($data as $d => $dt)
                {
                    $Inventario = new TB_INVENTARIO();

                    $insertInv = $Inventario->TransaccionTraslado($dt);

                    $validaInv[$d] = $insertInv?1:0;
                }

                if(!in_array(0,$validaInv))
                {
                    $info = ['titulo'=>'PROCESO EXITOSO','msg'=>'El ingreso de proveedor fue realizado exitosamente','class'=>'info'];
                    Session::flash('mensaje',$info);
                    DB::commit();
                }
                else
                {
                    $info = ['titulo'=>'PROCESO INCOMPLETO','msg'=>'No fue posible registrar la Actualización de Inventario','class'=>'danger'];
                    Session::flash('mensaje',$info);
                    DB::rollback();
                }
            }
            else
            {
                $info = ['titulo'=>'PROCESO INCOMPLETO','msg'=>'No fue posible registrar el Ingreso de Proveedor','class'=>'danger'];
                Session::flash('mensaje',$info);
                DB::rollback();
            }
        }
        else
        {
            $info = ['titulo'=>'PROCESO INCOMPLETO','msg'=>'No fue posible registrar el Movimiento de Artículos','class'=>'danger'];
            Session::flash('mensaje',$info);
            DB::rollback();
        }

        return true;
    }
}