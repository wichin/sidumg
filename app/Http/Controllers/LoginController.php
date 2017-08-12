<?php

namespace App\Http\Controllers;

use App\Models\CAT_CATEGORIA;
use App\Models\TB_MODULO;
use App\Models\TB_USUARIO;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    private $Usuario;

    public function __construct()
    {
        $this->Usuario = new TB_USUARIO();
    }


    public function Index(Request $request)
    {
        if($this->CheckSession())
        {
            return redirect(url('/inicio'));
        }
        else
        {
            $isLogin = true;
            if($request->isMethod('get'))
            {
                $tituloPagina = 'Inicio de Sesi&oacute;n';
                return view('layout.login',get_defined_vars());
            }
            else if ($request->isMethod('post'))
            {
                if ($this->CheckLogin($request))
                {
                    $tituloPagina = 'Inicio';
                    return redirect('/inicio');
                }
                else
                {
                    $info = ['titulo'=>'ACCESO DENEGADO','msg'=>'El nombre de usuario y la contraseña que ingresaste no coinciden con nuestros registros.','class'=>'danger'];
                    Session::flash('mensaje',$info);

                    $tituloPagina = 'Inicio de Sesi&oacute;n';
                    return view('layout.login',get_defined_vars());
                }
            }
        }
    }

    public function Init()
    {
        $usuario = Session::get('usuario');

        $tituloPagina = 'Inicio';
        return view('layout.main',get_defined_vars());
    }

    public function CheckSession()
    {
        return Session::has('usuario');
    }

    public function CheckLogin($request)
    {
        $usuario = $request->usuario;
        $clave   = md5($request->clave);

        if(isset($usuario)&&isset($clave))
        {
            $Check   = $this->Usuario->Check($usuario, $clave,1);

            if(isset($Check) && count($Check) > 0)
            {
                $idUsuario = $Check[0]->id;
                $Menus   = $this->GetMenu($idUsuario);

                $data = [
                    'nombres'   => $Check[0]->Persona->nombres.' '.$Check[0]->Persona->apellidos,
                    'id'        => $Check[0]->id,
                    'email'     => $Check[0]->correo,
                    'menu'      => $Menus
                ];
                Session::put('usuario',$data);
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public function GetMenu($idUsuario)
    {
        $Menus = $this->Usuario->MenusUsuario($idUsuario);

        if(isset($Menus[0]->Rol->AccesoRol)&&count($Menus[0]->Rol->AccesoRol)>0)
        {
            $data = [];
            $i    = 0;
            foreach ($Menus[0]->Rol->AccesoRol as $item)
            {
                if($item->Menu->Modulo->estado==1 && $item->Menu->estado==1)
                {
                    $data[$i]['idModulo']       = $item->Menu->Modulo->id;
                    $data[$i]['nomModulo']      = $item->Menu->Modulo->nombre;
                    $data[$i]['clase']          = $item->Menu->Modulo->clase;
                    $data[$i]['idMenu']         = $item->Menu->id;
                    $data[$i]['nomMenu']        = $item->Menu->nombre;
                    $data[$i]['url']            = $item->Menu->url;
                    $i++;
                }
            }

            if(count($data)>0)
            {
                $miCollect  = collect($data);
                $data       = json_decode($miCollect->groupBy('idModulo'));
            }

            return $data;
        }
        else
        {
            return [];
        }
    }

    public function Logout()
    {
        Session::forget('usuario');

        $tituloPagina = 'Inicio de Sesi&oacute;n';
        return redirect(url('/'));
    }
}
