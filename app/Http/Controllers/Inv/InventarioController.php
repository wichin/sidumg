<?php

namespace App\Http\Controllers\Inv;

use App\Models\CAT_CATEGORIA;
use App\Models\CAT_COLOR;
use App\Models\CAT_DEPORTE;
use App\Models\CAT_GENERO;
use App\Models\CAT_TALLA;
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

        return view('modulos.inventario.crearArticulo',get_defined_vars());
    }
}
