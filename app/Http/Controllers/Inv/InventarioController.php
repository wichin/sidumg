<?php

namespace App\Http\Controllers\Inv;

use App\Models\CAT_CATEGORIA;
use App\Models\CAT_COLOR;
use App\Models\CAT_DEPORTE;
use App\Models\CAT_GENERO;
use App\Models\CAT_TALLA;
use App\Models\TB_ARTICULO;
use App\Models\TB_LOCAL;
use App\Models\TB_MOVIMIENTO_INVENTARIO;
use App\Models\TB_PROVEEDOR;
use App\Models\TB_USUARIO;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class InventarioController extends Controller
{
    private $Menu, $Usuario;

    public function __construct()
    {
        $this->Usuario  = new TB_USUARIO();
        $this->Menu     = Session::get('usuario');
    }

    public function InitCrearCategoria(Request $request)
    {
        $tituloPagina   = 'Categoría';
        $usuario        = $this->Menu;
        $titulo         = 'Crear Categoría';
        $Categoria      = new CAT_CATEGORIA();

        if($request->isMethod('post'))
        {
            $nombre = $request->nombre;
            if(isset($nombre)&&$nombre!='')
            {
                $data['nombre']     = $nombre;
                $data['usuario']    = $usuario['id'];
                $data['fecha']      = Carbon::now()->format('Y/m/d H:i:s');

                $insertCategoria = $Categoria->SetCategoria($data);
                if($insertCategoria!=false)
                {
                    $info = ['titulo'=>'EXITO','msg'=>'La categoría '.$nombre.' fue creada correctamente.','class'=>'info'];
                    Session::flash('mensaje',$info);
                }
                else
                {
                    $info = ['titulo'=>'ERROR','msg'=>'El nombre '.$nombre.' ya esta registrado como una Categoría','class'=>'warning'];
                    Session::flash('mensaje',$info);
                }
            }
            else
            {
                $info = ['titulo'=>'ERROR','msg'=>'Los valores enviados no son correctos.','class'=>'danger'];
                Session::flash('mensaje',$info);
            }

            $dataCategoria  = $Categoria->GetCategoria();
            return redirect(url('inventario/crearCategoria'));
        }
        else
        {
            $dataCategoria  = $Categoria->GetCategoria();
            return view('modulos.inventario.crearCategoria',get_defined_vars());
        }
    }

    public function InitCrearArticulo(Request $request)
    {
        $tituloPagina   = 'Artículo';
        $usuario        = $this->Menu;
        $isLarge        = true;
        $titulo         = 'Crear Artículo';

        $Categoria  = new CAT_CATEGORIA();
        $Deporte    = new CAT_DEPORTE();
        $Proveedor  = new TB_PROVEEDOR();
        $Genero     = new CAT_GENERO();
        $Color      = new CAT_COLOR();
        $Talla      = new CAT_TALLA();

        $selectCategoria    = $Categoria->GetCategoria(1);
        $selectDeporte      = $Deporte->GetDeporte(1);
        $selectMarca        = $Proveedor->GetProveedor(1);
        $selectGenero       = $Genero->GetGenero(1);
        $selectColor        = $Color->GetColor(1);
        $selectTalla        = $Talla->GetTalla(1);

        if($request->isMethod('post'))
        {
            $dataInsert['precio_venta'] = $request->precio;
            $dataInsert['descripcion']  = $request->descripcion;
            $dataInsert['id_categoria'] = $request->categoria;
            $dataInsert['id_deporte']   = $request->deporte;
            $dataInsert['id_proveedor'] = $request->marca;
            $dataInsert['id_genero']    = $request->genero;
            $dataInsert['id_color']     = $request->color;
            $dataInsert['id_talla']     = $request->talla;

            $Articulo = new TB_ARTICULO();

            # Validamos la existencia del articulo
            $validacion = $Articulo->ValidaArticulo($dataInsert);
            if(isset($validacion)&& count($validacion)==0)
            {
                $dataInsert['fecha_creacion']   = Carbon::now()->format('Y/m/d H:i:s');
                $dataInsert['usuario_creacion'] = $this->Menu['id'];

                # Insertamos el articulo en base de datos.
                if($Articulo->SetArticulo($dataInsert))
                {
                    $info = ['titulo'=>'EXITO','msg'=>'El Artículo fue creado exitosamente.','class'=>'success'];
                    Session::flash('mensaje',$info);
                }
                else
                {
                    $info = ['titulo'=>'ERROR','msg'=>'No fue posible la creacion del producto.','class'=>'danger'];
                    Session::flash('mensaje',$info);
                }
            }
            else
            {
                $info = ['titulo'=>'ERROR','msg'=>'El Artículo ya se encuentra registrado en el inventario.','class'=>'danger'];
                Session::flash('mensaje',$info);
            }

            return redirect(url('inventario/crearArticulo'));
        }

        return view('modulos.inventario.crearArticulo',get_defined_vars());
    }

    public function InitIngresoProveedor(Request $request)
    {
        $tituloPagina   = 'Proveedor';
        $usuario        = $this->Menu;
        $isLarge        = true;
        $titulo         = 'Ingreso Proveedor';

        $Proveedor      = new TB_PROVEEDOR();
        $selectProv     = $Proveedor->GetProveedor(1);

        if($request->isMethod('post'))
        {
            $ingreso = $request->ingreso;
            $dataIngreso = explode('+',$ingreso);
            $dataArticulos  = [];
            $hoy            = Carbon::now()->format('Y/m/d H:i:s');
            $idUsuario      = $this->Menu['id'];
            $idLocal        = $this->Menu['local']->id;

            foreach ($dataIngreso as $di)
            {
                $item   = explode('|',$di);
                $dataArticulos[] = array(
                    'id_proveedor'      => $item[0],
                    'id_articulo'       => $item[1],
                    'cantidad'          => $item[2],
                    'precio_compra'     => $item[3],
                    'fecha'             => $hoy,
                    'id_usuario'        => $idUsuario,
                    'id_local'          => $idLocal,
                    'id_transaccion'    => 1,   // Nuevo Ingreso
                    'operacion'         => '+'  // Agregar a inventario 
                );
            }

            $MovimientoInventario   = new TB_MOVIMIENTO_INVENTARIO();
            $resultTransaction      = $MovimientoInventario->InsertIngresoProveedor($dataArticulos);

            return redirect(url('inventario/ingresoProveedor'));
        }

        return view('modulos.inventario.ingresoProveedor',get_defined_vars());
    }
    
    public function InitBuscaArticulo(Request $request)
    {
        $sugerencias = [];

        $data   = $request->all();
        $query  = $data['query'];

        $Articulo = new TB_ARTICULO();
        $dataArticulo = $Articulo->GetAutocompleteArticulo($query);

        if(isset($dataArticulo)&&count($dataArticulo)>0)
        {
            foreach ($dataArticulo as $da)
            {
                $sugerencias[] = array(
                    'value' => $da->descripcion,
                    'data'  => $da->id
                );
            }
        }

        return json_encode(array(
            'query'         => $query,
            'suggestions'   => $sugerencias
        ));
    }
    
    public function InitTrasladoArticulo(Request $request)
    {
        $tituloPagina   = 'Traslado Artículo';
        $usuario        = $this->Menu;
        $isLarge        = true;
        $titulo         = 'Traslado Artículo';
        
        $Local  = new TB_LOCAL();
        $selectLocal = $Local->GetLocalTipo(3);

        if($request->isMethod('post'))
        {
            return redirect(url('inventario/trasladoArticulo'));
        }

        return view('modulos.inventario.trasladoArticulo',get_defined_vars());
    }

    public function InitBuscaArticuloBodega(Request $request)
    {
        $sugerencias = [];

        $data       = $request->all();
        $query      = $data['query'];
        $idLocal    = $this->Menu['local']->id;

        $Articulo = new TB_ARTICULO();
        $dataArticulo = $Articulo->GetAutocompleteArticuloBodega($query, $idLocal);

        if(isset($dataArticulo)&&count($dataArticulo)>0)
        {
            foreach ($dataArticulo as $da)
            {
                $sugerencias[] = array(
                    'value' => $da->descripcion,
                    'data'  => $da->id,
                    'count' => $da->cantidad
                );
            }
        }

        return json_encode(array(
            'query'         => $query,
            'suggestions'   => $sugerencias
        ));
    }
}
