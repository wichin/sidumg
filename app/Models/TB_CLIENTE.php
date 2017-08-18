<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TB_CLIENTE extends Model
{
    protected $table = 'TB_CLIENTE';
    public $timestamps = false;
    
    public function Factura()
    {
        return $this->hasMany('App\Models\TB_FACTURA','id_cliente','id');
    }

    public function Cuenta()
    {
        return $this->hasMany('App\Models\TB_CUENTA','id_cliente','id');
    }
    
    public function Persona()
    {
        return $this->belongsTo('App\Models\TB_PERSONA','id_persona','id');
    }
    
    public function TipoCliente()
    {
        return $this->belongsTo('App\Models\CAT_TIPO_CLIENTE','id_tipo_cliente','id');
    }

    ## Transacciones

    public function SetCliente($data)
    {
        return $this->insert($data);
    }

    ## Transacciones

    public function TransaccionCliente($data, $tipoCliente)
    {
        $Persona = new TB_PERSONA();
        $validaDoc = $Persona->ValidaDocumento($data['documento']);
        
        if(isset($validaDoc)&&count($validaDoc)>0)
        {
            $info = ['titulo'=>'DOCUMENTO INVALIDO','msg'=>'El documento ingreado ya fue registrado en el sistema','class'=>'danger'];
            Session::flash('mensaje',$info);
        }
        else
        {
            DB::beginTransaction();
            $idPersona = $Persona->SetPersona($data);
            if($idPersona)
            {
                $insertaCliente = $this->insert([
                    'id_persona'        => $idPersona,
                    'id_tipo_cliente'   => $tipoCliente,
                    'usuario_creacion'  => $data['usuario_creacion'],
                    'fecha_creacion'    => $data['fecha_creacion']
                ]);

                if($insertaCliente)
                {
                    $info = ['titulo'=>'CLIENTE CREADO','msg'=>'El cliente fue creado con éxito.','class'=>'info'];
                    Session::flash('mensaje',$info);
                    DB::commit();
                }
                else
                {
                    $info = ['titulo'=>'PROCESO INCOMPLETO','msg'=>'El proceso final de creación del cliente no se completó.','class'=>'danger'];
                    Session::flash('mensaje',$info);
                    DB::rollBack();
                }
            }
            else
            {
                $info = ['titulo'=>'PROCESO INCOMPLETO','msg'=>'El proceso de creación del cliente no se completó.','class'=>'danger'];
                Session::flash('mensaje',$info);
                DB::rollBack();
            }
        }
        return true;
    }

    public function GetClienteNombre($data)
    {
        return DB::table('TB_CLIENTE AS C')
            ->join('TB_PERSONA AS P','P.ID','=','C.ID_PERSONA')
            ->where('P.NOMBRES','like','%'.$data.'%')
            ->orWhere('P.APELLIDOS','like','%'.$data.'%')
            ->select('p.nombres','p.apellidos','p.documento','c.id')
            ->get();
    }

    public function GetClienteDocumento($data)
    {
        return DB::table('TB_CLIENTE AS C')
            ->join('TB_PERSONA AS P','P.ID','=','C.ID_PERSONA')
            ->where('P.DOCUMENTO','like','%'.$data.'%')
            ->select('p.nombres','p.apellidos','p.documento','c.id')
            ->get();
    }
}