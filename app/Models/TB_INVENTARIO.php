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

    public function ValidaInventario($data)
    {
        return $this->where('id_local',$data['id_local'])
            ->where('id_articulo',$data['id_articulo'])
            ->get();
    }

    public function UpdateInventario($data)
    {
        return $this->where('id_local',$data['id_local'])
            ->where('id_articulo',$data['id_articulo'])
            ->update([
                'cantidad'              => DB::raw( 'cantidad '.$data['operacion'].' '.$data['cantidad']),
                'ultima_modificacion'   => $data['fecha']
            ]);
    }

    public function InsertInventario($data)
    {
        return $this->insert([
            'id_local'              => $data['id_local'],
            'id_articulo'           => $data['id_articulo'],
            'cantidad'              => $data['cantidad'],
            'ultima_modificacion'   => $data['fecha']
        ]);
    }
    
    public function TransaccionProveedor($data)
    {
        $validacion = $this->ValidaInventario($data);
        
        if(isset($validacion)&&count($validacion)>0)
        {
            return $this->UpdateInventario($data);
        }
        else
        {
            return $this->InsertInventario($data);
        }
    }
}