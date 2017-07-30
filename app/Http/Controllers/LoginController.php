<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
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
                    $info = ['titulo'=>'ACCESO DENEGADO','msg'=>'El nombre de usuario y la contraseña que ingresaste no coinciden con nuestros registros.','class'=>'error'];
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
        return view('welcome',get_defined_vars());
    }

    public function CheckSession()
    {
        return Session::has('usuario');
    }

    public function CheckLogin($request)
    {
        $usuario = $request->usuario;
        $clave   = md5($request->clave);

        if($usuario == 'wii')
        {
            $data = ['nombres'=>'wii','id'=>'1', 'email'=>'mail@wii.com'];
            Session::put('usuario',$data);
            return true;
        }
        else
        {
            return false;
        }




        /*
        $query = DB::table('tb_usuario')
            ->join('tb_persona', 'tb_persona.cui', '=', 'tb_usuario.cui_persona')
            ->select('tb_usuario.id','tb_usuario.email','tb_persona.nombres','tb_persona.apellidos')
            ->where('tb_usuario.email',$usuario)
            ->where('tb_usuario.password',$clave)
            ->where('tb_usuario.estado',1)
            ->get();

        if(isset($query) && count($query) > 0)
        {
            $data = ['nombres'=>$query[0]->nombres.' '.$query[0]->apellidos,'id'=>$query[0]->id, 'email'=>$query[0]->email];
            Session::put('usuario',$data);
            return true;
        }
        else
        {
            return false;
        }*/
    }

    public function Logout()
    {
        Session::forget('usuario');

        $tituloPagina = 'Inicio de Sesi&oacute;n';
        return redirect(url('/'));
    }
}
