<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TB_ARTICULO extends Model
{
    protected $table = 'TB_ARTICULO';
    public $timestamps = false;
    
    public function MovimientoInventario()
    {
        return $this->hasMany('App\Models\TB_MOVIMIENTO_INVENTARIO','id_articulo','id');
    }

    public function IngresoProveedor()
    {
        return $this->hasMany('App\Models\TB_INGRESO_PROVEEDOR','id_articulo','id');
    }

    public function MovimientoLocal()
    {
        return $this->hasMany('App\Models\TB_MOVIMIENTO_LOCAL','id_articulo','id');
    }

    public function Inventario()
    {
        return $this->hasMany('App\Models\TB_INVENTARIO','id_articulo','id');
    }

    public function Categoria()
    {
        return $this->belongsTo('App\Models\CAT_CATEGORIA','id_categoria','id');
    }

    public function Deporte()
    {
        return $this->belongsTo('App\Models\CAT_DEPORTE','id_deporte','id');
    }

    public function Proveedor()
    {
        return $this->belongsTo('App\Models\CAT_PROVEEDOR','id_proveedor','id');
    }

    public function Genero()
    {
        return $this->belongsTo('App\Models\CAT_GENERO','id_genero','id');
    }

    public function Color()
    {
        return $this->belongsTo('App\Models\CAT_COLOR','id_color','id');
    }

    public function Talla()
    {
        return $this->belongsTo('App\Models\CAT_TALLA','id_talla','id');
    }

    public function ValidaArticulo($data)
    {
        return $this->where('id_categoria',$data['id_categoria'])
            ->where('id_deporte',$data['id_categoria'])
            ->where('id_proveedor',$data['id_proveedor'])
            ->where('id_genero',$data['id_genero'])
            ->where('id_color',$data['id_color'])
            ->where('id_talla',$data['id_talla'])
            ->get();

    }

    public function SetArticulo($data)
    {
        return $this->insert($data);
    }

    public function GetAutocompleteArticulo($data)
    {
        return $this->where('descripcion','like','%'.$data.'%')->orderBy('descripcion')->get();
    }

    public function GetAutoCompleteArticuloBodega($data, $local)
    {
        return DB::table('tb_articulo')
            ->join('tb_inventario','tb_inventario.id_articulo','=','tb_articulo.id')
            ->where('tb_articulo.descripcion','like','%'.$data.'%')
            ->where('tb_inventario.id_local',$local)
            ->where('tb_inventario.cantidad','>',0)
            ->select('tb_articulo.id','tb_articulo.descripcion','tb_inventario.cantidad','tb_articulo.precio_venta')
            ->get();
    }
}