<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TB_USUARIO extends Model
{
    protected $table = 'TB_USUARIO';
    public $timestamps = false;

    public function Persona()
    {
        return $this->belongsTo('App\Models\TB_PERSONA','id_persona','id');
    }

    public function Rol()
    {
        return $this->belongsTo('App\Models\TB_ROL','id_rol','id');
    }

    public function EstadoUsuario()
    {
        return $this->belongsTo('App\Models\CAT_ESTADO_USUARIO','id_estado','id');
    }

    public function TipoUsuario()
    {
        return $this->belongsTo('App\Models\CAT_TIPO_USUARIO','id_tipo_usuario','id');
    }


    /**
     * VALIDA LAS CREDENCIALES DEL USUARIO
     * @param $usuario
     * @param null $clave
     * @param null $estado
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function Check($usuario, $clave = null, $estado = null)
    {
        return $this->with('Persona')
            ->where('correo',$usuario)
            ->where(function ($sqlClave) use($clave){
                if(isset($clave))
                {
                    $sqlClave->where('password',$clave);
                }
            })
            ->where(function($sql) use($estado){
                if(isset($estado))
                {
                    $sql->where('id_estado',$estado);
                }
            })
            ->get();
    }

    /**
     * Obtiene los accesos de usuario con acceso al sistema
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function MenusUsuario($id)
    {
        return $this->with('Rol.AccesoRol.Menu.Modulo')
            ->where('id',$id)
            ->get();
    }

    public function ListaUsuarios($idUsuario = null, $estado = null)
    {
        return $this->with('Persona','Rol','TipoUsuario','EstadoUsuario')
            ->where(function ($sqlUser) use ($idUsuario){
                if(isset($idUsuario))
                {
                    $sqlUser->where('id',$idUsuario);
                }
            })
            ->where(function ($sqlEstado) use($estado){
                if(isset($estado))
                {
                    $sqlEstado->where('id_estado',$estado);
                }
            })
            ->get();
    }

    /**
     * Crea persona y usuario nuevo
     * @param $data
     */
    public function SetUsuario($data)
    {
        $Persona = new TB_PERSONA();

        $validaCorreo = $this->Check($data->correo);

        if(count($validaCorreo)==0)
        {
            DB::beginTransaction();

            $format = null;
            if(isset($data->nacimiento)&&$data->nacimiento!='')
            {
                $fecha  = Carbon::createFromFormat('d/m/Y', $data->nacimiento);
                $format = Carbon::parse($fecha)->format('Y/m/d');
            }

            $hoy    = Carbon::now()->format('Y/m/d H:i:s');
            $idUser = Session::get('usuario')['id'];

            $insertPersona = $Persona::insertGetId([
                'nombres'           => $data->nombres,
                'apellidos'         => $data->apellidos,
                'fecha_nacimiento'  => $format,
                'direccion'         => $data->direccion,
                'nit'               => $data->nit,
                'documento'         => $data->documento,
                'id_tipo_documento' => isset($data->tipoDocumento)?$data->tipoDocumento:null,
                'id_genero'         => isset($data->genero)?$data->genero:null,
                'id_nacionalidad'   => isset($data->nacionalidad)?$data->nacionalidad:null,
                'celular'           => $data->celular,
                'telefono'          => $data->telefono,
                'usuario_creacion'  => $idUser,
                'fecha_creacion'    => $hoy
            ]);

            if($insertPersona)
            {
                $insertUsuario = $this->insert([
                    'correo'            => $data->correo,
                    'password'          => md5('admin'),
                    'id_persona'        => $insertPersona,
                    'id_rol'            => $data->rol,
                    'id_tipo_usuario'   => $data->tipoUsuario,
                    'id_estado'         => 1,
                    'usuario_creacion'  => $idUser,
                    'fecha_creacion'    => $hoy
                ]);

                if($insertUsuario)
                {
                    $info = ['titulo'=>'USUARIO CREADO','msg'=>'El usuario fue creado con éxito.','class'=>'info'];
                    Session::flash('mensaje',$info);
                    DB::commit();
                }
                else
                {
                    $info = ['titulo'=>'PROCESO INCOMPLETO','msg'=>'No fue posible la creación del usuario.','class'=>'danger'];
                    Session::flash('mensaje',$info);
                    DB::rollBack();
                }
            }
            else
            {
                $info = ['titulo'=>'PROCESO INCOMPLETO','msg'=>'El proceso de creación de usuario no se completó.','class'=>'danger'];
                Session::flash('mensaje',$info);
                DB::rollBack();
            }
        }
        else
        {
            $info = ['titulo'=>'CORREO INVALIDO','msg'=>'El correo ya fue registrado en el sistema','class'=>'danger'];
            Session::flash('mensaje',$info);
        }
    }

    public function CambioEstado($id, $estado)
    {
        $hoy    = Carbon::now()->format('Y/m/d H:i:s');
        $idUser = Session::get('usuario')['id'];

        return $this->where('id',$id)
            ->update([
                'id_estado'     => $estado,
                'fecha_modificacion'    => $hoy,
                'usuario_modificacion'  => $idUser
            ]);
    }
}