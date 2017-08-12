<?php

namespace App\Http\Controllers\Admin;

use App\Models\CAT_GENERO;
use App\Models\CAT_NACIONALIDAD;
use App\Models\CAT_TIPO_DOCUMENTO;
use App\Models\CAT_TIPO_USUARIO;
use App\Models\TB_ROL;
use App\Models\TB_USUARIO;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private $Menu, $Usuario;

    public function __construct()
    {
        $this->Usuario  = new TB_USUARIO();
        $this->Menu     = Session::get('usuario');
    }

    public function initCrearUsuario(Request $request)
    {
        $tituloPagina   = 'Crear Usuario';
        $usuario        = $this->Menu;
        $titulo         = 'Crear Usuario';
        $isLarge        = true;

        //CATALOGOS
        $Rol            = new TB_ROL();
        $TipoUsuario    = new CAT_TIPO_USUARIO();
        $TipoDoc        = new CAT_TIPO_DOCUMENTO();
        $Genero         = new CAT_GENERO();
        $Nacionalidad   = new CAT_NACIONALIDAD();

        $selectRol          = $Rol->GetRol(1);
        $selectTipoUsuario  = $TipoUsuario->GetTipoUsuario(1);
        $selectTipoDoc      = $TipoDoc->GetTipoDocumento(1);
        $selectGenero       = $Genero->GetGenero(1);
        $selectNac          = $Nacionalidad->GetNacionalidad(1);

        if($request->isMethod('POST'))
        {
            $this->Usuario->SetUsuario($request);

            return redirect(url('admin/crearUsuario'));
        }


        return view('modulos.admin.crearUsuario',get_defined_vars());
    }

    public function initVerUsuario(Request $request)
    {
        $tituloPagina   = 'Ver Usuario';
        $usuario        = $this->Menu;
        $titulo         = 'Usuarios del Sistema';
        $isLarge        = true;
        $dataUsuario    = $this->Usuario->ListaUsuarios();

        return view('modulos.admin.verUsuario',get_defined_vars());
    }

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
}