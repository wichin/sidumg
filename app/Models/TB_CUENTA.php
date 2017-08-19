<?php

namespace App\Models;

use Carbon\Carbon;
use Hamcrest\Core\Set;
use Illuminate\Database\Eloquent\Model;

class TB_CUENTA extends Model
{
    protected $table = 'TB_CUENTA';
    public $timestamps = false;

    public function CuentaDetalle()
    {
        return $this->hasMany('App\Models\TB_CUENTA_DETALLE','id_cuenta','id');
    }
    
    public function Cliente()
    {
        return $this->belongsTo('App\Models\TB_CLIENTE','id_cliente','id');
    }

    ## Transacciones

    public function ValidaCuenta($idCliente)
    {
        return $this->where('id_cliente',$idCliente)->get();
    }

    public function SetCuenta($idCliente, $idUsuario)
    {
        $hoy = Carbon::now()->format('Y/m/d H:i:s');

        return $this->insertGetId([
            'id_cliente'        => $idCliente,
            'usuario_creacion'  => $idUsuario,
            'fecha_creacion'    => $hoy
        ]);
    }

    public function TransaccionCreacionCuenta($idCliente, $idUsuario)
    {
        $dataCuenta = $this->ValidaCuenta($idCliente);

        if(isset($dataCuenta)&&count($dataCuenta)>0)
        {
            return $dataCuenta[0]->id;
        }
        else
        {
            return $this->SetCuenta($idCliente, $idUsuario);
        }
    }
}