<?php

namespace App\Http\Controllers\Admin;

use App\Models\CAT_GENERO;
use App\Models\CAT_NACIONALIDAD;
use App\Models\CAT_TIPO_DOCUMENTO;
use App\Models\CAT_TIPO_LOCAL;
use App\Models\CAT_TIPO_USUARIO;
use App\Models\TB_EMPRESA;
use App\Models\TB_LOCAL;
use App\Models\TB_ROL;
use App\Models\TB_USUARIO;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private $Menu, $Usuario;

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->Usuario  = new TB_USUARIO();
        $this->Menu     = Session::get('usuario');
    }

    /**
     * Modulo para creación de usuarios
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function initCrearUsuario(Request $request)
    {
        $tituloPagina   = 'Crear Usuario';
        $usuario        = $this->Menu;
        $titulo         = 'Crear Usuario';
        $isLarge        = true;

        //CATALOGOS
        $Rol            = new TB_ROL();
        $TipoUsuario    = new CAT_TIPO_USUARIO();
        $Local          = new TB_LOCAL();
        $TipoDoc        = new CAT_TIPO_DOCUMENTO();
        $Genero         = new CAT_GENERO();
        $Nacionalidad   = new CAT_NACIONALIDAD();

        $selectRol          = $Rol->GetRol(1);
        $selectTipoUsuario  = $TipoUsuario->GetTipoUsuario(1);
        $selectLocal        = $Local->GetLocalAll(1);
        $selectTipoDoc      = $TipoDoc->GetTipoDocumento(1);
        $selectGenero       = $Genero->GetGenero(1);
        $selectNac          = $Nacionalidad->GetNacionalidad(1);

        if($request->isMethod('POST'))
        {
            # Se realiza la inserción del nuevo usuario
            $this->Usuario->SetUsuario($request);

            return redirect(url('admin/crearUsuario'));
        }


        return view('modulos.admin.crearUsuario',get_defined_vars());
    }

    /**
     * Modulo para mostrar los usuarios del sistemas
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function initVerUsuario(Request $request)
    {
        $tituloPagina   = 'Ver Usuario';
        $usuario        = $this->Menu;
        $titulo         = 'Usuarios del Sistema';
        $isLarge        = true;
        $dataUsuario    = $this->Usuario->ListaUsuarios();

        return view('modulos.admin.verUsuario',get_defined_vars());
    }

    /**
     * Funcionalidad para cambio de estado de usuarios
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function CambioEstadoUsuario(Request $request)
    {
        $idUser     = $request->usr;
        $estado     = $request->sta;

        if(isset($idUser)&&isset($estado))
        {
            $cambioEstado = $this->Usuario->CambioEstado($idUser, $estado);

            if($cambioEstado)
            {
                $info = ['titulo'=>'CAMBIO DE ESTADO','msg'=>'El estado del usuario fue modificado exitosamente.','class'=>'info'];
                Session::flash('mensaje',$info);
            }
            else
            {
                $info = ['titulo'=>'CAMBIO DE ESTADO','msg'=>'No fue posible realizar el cambio de estado para el usuario.','class'=>'danger'];
                Session::flash('mensaje',$info);
            }
        }
        else
        {
            $info = ['titulo'=>'CAMBIO DE ESTADO','msg'=>'Los valores enviados no son validos para realizar la transaccion.','class'=>'danger'];
            Session::flash('mensaje',$info);
        }

        return redirect(url('admin/verUsuario'));
    }

    public function InitGestionLocal(Request $request)
    {
        $tituloPagina   = 'Gestión de Local';
        $usuario        = $this->Menu;
        $titulo         = 'Gestión de Local';
        $isLarge        = true;

        $TipoLocal  = new CAT_TIPO_LOCAL();
        $Empresa    = new TB_EMPRESA();
        $Local      = new TB_LOCAL();

        $selectTipoLocal = $TipoLocal->GetTipoLocal(1);
        $selectEmpresa   = $Empresa->GetEmpresa(1);
        $dataLocal       = $Local->GetLocalAll(1);

        if($request->isMethod('post'))
        {
            $dataInsert['nombre']           = $request->nombre;
            $dataInsert['direccion']        = $request->direccion;
            $dataInsert['telefono']         = $request->telefono;
            $dataInsert['id_empresa']       = $request->empresa;
            $dataInsert['id_tipo_local']    = $request->tipoLocal;
            $dataInsert['fecha_creacion']   = Carbon::now()->format('Y/m/d H:i:s');
            $dataInsert['usuario_creacion'] = $this->Menu['id']; 
            
            if($Local->SetLocal($dataInsert))
            {
                $info = ['titulo'=>'EXITO','msg'=>'El Artículo fue creado exitosamente.','class'=>'success'];
                Session::flash('mensaje',$info);
            }
            else
            {
                $info = ['titulo'=>'ERROR','msg'=>'No fue posible la creacion del producto.','class'=>'danger'];
                Session::flash('mensaje',$info);
            }

            return redirect(url('admin/gestionLocal'));
        }

        return view('modulos.admin.gestionLocal',get_defined_vars());
    }
}