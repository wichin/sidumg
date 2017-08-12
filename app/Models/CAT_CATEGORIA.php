<?php

namespace App\Models;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class CAT_CATEGORIA extends Model
{
    protected $table = 'CAT_CATEGORIA';
    public $timestamps = false;

    public function GetCategoria($estado=null)
    {
        return $this->where(function ($sql) use ($estado){
            if(isset($estado))
            {
                $sql->where('estado',$estado);
            }
        })->select('id','nombre','estado')->orderBy('nombre')->get();
    }

    public function SetCategoria($data)
    {
        $validaCategoria = $this->where('nombre',$data['nombre'])->get();

        if(isset($validaCategoria)&&count($validaCategoria)>0)
        {
            return false;
        }
        else
        {
            return $this->insertGetId([
                'nombre'            => $data['nombre'],
                'usuario_creacion'  => $data['usuario'],
                'fecha_creacion'    => $data['fecha']
            ]);
        }
    }
}