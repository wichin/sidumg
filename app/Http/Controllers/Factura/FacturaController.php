<?php

namespace App\Http\Controllers\Factura;

use App\Models\CAT_GENERO;
use App\Models\CAT_NACIONALIDAD;
use App\Models\CAT_TIPO_CLIENTE;
use App\Models\CAT_TIPO_COBRO;
use App\Models\CAT_TIPO_DOCUMENTO;
use App\Models\TB_ARTICULO;
use App\Models\TB_AUTORIZACION_FACTURA;
use App\Models\TB_CLIENTE;
use App\Models\TB_LOCAL;
use App\Models\TB_USUARIO;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FacturaController extends Controller
{
    private $Menu, $Usuario;

    public function __construct()
    {
        $this->Usuario  = new TB_USUARIO();
        $this->Menu     = Session::get('usuario');
    }

    public function InitAgregarAutorizacion(Request $request)
    {
        $tituloPagina   = 'Autorización Factura';
        $usuario        = $this->Menu;
        $titulo         = 'Agregar Autorización de Factura';

        $Local  = new TB_LOCAL();
        $selectLocal = $Local->GetLocalTipo(3);

        if($request->isMethod('POST'))
        {
            $idLocal    = $request->local;
            $fecha      = Carbon::createFromFormat('d/m/Y', $request->fecha);
            $format     = Carbon::parse($fecha)->format('Y/m/d');

            $Autorizacion   = new TB_AUTORIZACION_FACTURA();
            $Validacion     = $Autorizacion->ValidaAutorizacionActiva($idLocal);

            $data['resolucion']         = $request->resolucion;
            $data['fecha_caducidad']    = $format;
            $data['valor_inicial']      = $request->valor_inicial;
            $data['valor_final']        = $request->valor_final;
            $data['serie']              = $request->serie;
            $data['valor_actual']       = $request->valor_inicial;
            $data['id_local']           = $request->local;
            $data['usuario_creacion']   = $usuario['id'];
            $data['fecha_creacion']     = Carbon::now()->format('Y/m/d H:i:s');
            $data['estado']             = isset($Validacion)&&count($Validacion)>0?0:1;

            if($Autorizacion->SetAutorizacion($data))
            {
                $info = ['titulo'=>'TRANSACCION EXITOSA','msg'=>'La Autorización fue registrada correctamente.    ','class'=>'info'];
                Session::flash('mensaje',$info);
            }
            else
            {
                $info = ['titulo'=>'ERROR','msg'=>'No fue posible registrar la Autorización','class'=>'warning'];
                Session::flash('mensaje',$info);
            }

            return redirect(url('factura/agregarAutorizacion'));
        }

        return view('modulos.factura.autorizacion',get_defined_vars());
    }

    public function InitCrearCliente(Request $request)
    {
        $tituloPagina   = 'Nuevo Cliente';
        $usuario        = $this->Menu;
        $titulo         = 'Creación de Cliente';
        $isLarge        = true;

        $TipoCliente    = new CAT_TIPO_CLIENTE();
        $TipoDoc        = new CAT_TIPO_DOCUMENTO();
        $Genero         = new CAT_GENERO();
        $Nacionalidad   = new CAT_NACIONALIDAD();

        $selectTipoCliente  = $TipoCliente->GetTipoCliente(1);
        $selectTipoDoc      = $TipoDoc->GetTipoDocumento(1);
        $selectGenero       = $Genero->GetGenero(1);
        $selectNac          = $Nacionalidad->GetNacionalidad(1);

        if($request->isMethod('post'))
        {
            $format = null;
            if(isset($request->nacimiento)&&$request->nacimiento!='')
            {
                $fecha  = Carbon::createFromFormat('d/m/Y', $request->nacimiento);
                $format = Carbon::parse($fecha)->format('Y/m/d');
            }

            $hoy    = Carbon::now()->format('Y/m/d H:i:s');
            $idUser = Session::get('usuario')['id'];

            $dataPersona['nombres']             = $request->nombres;
            $dataPersona['apellidos']           = $request->apellidos;
            $dataPersona['fecha_nacimiento']    = $format;
            $dataPersona['direccion']           = $request->direccion;
            $dataPersona['nit']                 = $request->nit;
            $dataPersona['documento']           = $request->documento;
            $dataPersona['id_tipo_documento']   = $request->tipoDocumento;
            $dataPersona['id_genero']           = $request->genero;
            $dataPersona['id_nacionalidad']     = $request->nacionalidad;
            $dataPersona['celular']             = $request->celular!=''?$request->celular:null;
            $dataPersona['telefono']            = $request->telefono!=''?$request->telefono:null;
            $dataPersona['usuario_creacion']    = $idUser;
            $dataPersona['fecha_creacion']      = $hoy;

            $tipoCliente                        = $request->tipoCliente;

            $Cliente = new TB_CLIENTE();
            $insertCliente = $Cliente->TransaccionCliente($dataPersona, $tipoCliente);

            return redirect(url('factura/crearCliente'));
        }

        return view('modulos.factura.cliente',get_defined_vars());
    }
    
    public function InitCrearFactura(Request $request)
    {
        $idLocal = $this->Menu['local']->id;
        $Autorizacion = new TB_AUTORIZACION_FACTURA();
        $ValidaAutorizacion = $Autorizacion->ValidaAutorizacionActiva($idLocal);

        if(isset($ValidaAutorizacion)&&count($ValidaAutorizacion)>0)
        {
            $tituloPagina   = 'Facturación';
            $usuario        = $this->Menu;
            $titulo         = 'Nueva Factura';
            $isLarge        = true;

            $TipoCobro      = new CAT_TIPO_COBRO();
            $selectTipoC    = $TipoCobro->GetTipoCobro(1);
            
            if($request->isMethod('post'))
            {
                dd($request->all());
            }

            return view('modulos.factura.nuevaFactura',get_defined_vars());
        }
        else
        {
            $info = ['titulo'=>'ERROR','msg'=>'El punto de venta no cuenta con Autorización activa para emitir Facturas','class'=>'error'];
            Session::flash('mensaje',$info);
            return redirect(url('/inicio'));
        }
    }
    
    public function InitBuscarClienteNombre(Request $request)
    {
        $sugerencias = [];

        $data   = $request->all();
        $query  = $data['query'];
        
        $Cliente = new TB_CLIENTE();
        $dataCliente = $Cliente->GetClienteNombre($query);

        if(isset($dataCliente)&&count($dataCliente)>0)
        {
            foreach ($dataCliente as $da)
            {
                $sugerencias[] = array(
                    'value' => $da->nombres.' '.$da->apellidos,
                    'data'  => $da->id,
                    'doc'   => $da->documento
                );
            }
        }

        return json_encode(array(
            'query'         => $query,
            'suggestions'   => $sugerencias
        ));
    }

    public function InitBuscarClienteDoc(Request $request)
    {
        $sugerencias = [];

        $data   = $request->all();
        $query  = $data['query'];

        $Cliente = new TB_CLIENTE();
        $dataCliente = $Cliente->GetClienteDocumento($query);

        if(isset($dataCliente)&&count($dataCliente)>0)
        {
            foreach ($dataCliente as $da)
            {
                $sugerencias[] = array(
                    'value' => $da->documento,
                    'data'  => $da->id,
                    'nom'   => $da->nombres.' '.$da->apellidos
                );
            }
        }

        return json_encode(array(
            'query'         => $query,
            'suggestions'   => $sugerencias
        ));
    }

    public function InitBuscaArticuloLocal(Request $request)
    {
        $sugerencias = [];

        $data       = $request->all();
        $query      = $data['query'];
        $idLocal    = $this->Menu['local']->id;

        $Articulo = new TB_ARTICULO();
        $dataArticulo = $Articulo->GetAutoCompleteArticuloBodega($query, $idLocal);

        if(isset($dataArticulo)&&count($dataArticulo)>0)
        {
            foreach ($dataArticulo as $da)
            {
                $sugerencias[] = array(
                    'value' => $da->descripcion,
                    'data'  => $da->id,
                    'count' => $da->cantidad,
                    'price' => $da->precio_venta
                );
            }
        }

        return json_encode(array(
            'query'         => $query,
            'suggestions'   => $sugerencias
        ));
    }
}
