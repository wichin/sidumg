@extends('layout.main')

@section('css')
    {!! Html::style('assets/autocomplete/content/styles.css') !!}
@stop


@section('contenido')
    <h4 class="blue-text text-darken-4">{{$titulo}}</h4>
    <hr><br>

    <div class="row">
        <div class="col s12 m4 l4 input-field">
            <select class="data-articulo" id="destino" name="destino" class="validate" required="" aria-required="true">
                <option value="" disabled selected></option>
                @if(isset($selectLocal)&&count($selectLocal)>0)
                    @foreach($selectLocal as $s)
                        <option value="{{$s->id}}">{{$s->nombre}}</option>
                    @endforeach
                @endif
            </select>
            <label for="destino">Punto de Venta Destino</label>
        </div>
        <div class="col s12 m8 l8 input-field">
            <input type="text" id="descripcion" name="descripcion">
            <input type="hidden" id="idArticulo" name="idArticulo">
            <label class="active">Artículo</label>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m3 l3 offset-m1 offset-l1 input-field">
            <input type="number" id="cantidad" name="cantidad" min="1">
            <label>Cantidad</label>
        </div>

        <div class="col s12 m7 l7">
            <br>
            <button class="waves-effect waves-light btn secondary-content" type="button" id="btnAgregar">
                AGREGAR <i class="material-icons right">control_point</i>
            </button>
        </div>
    </div>

    <div id="divLista" hidden>
        <hr>
        <div class="row">
            <table class="bordered" id="tblIngresos">
                <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="row">
            <button class="waves-effect waves-light btn blue darken-4 secondary-content" type="button" id="btnGuardar">
                CONFIRMAR <i class="material-icons right">check</i>
            </button>
        </div>
    </div>

    <form action="{{url('inventario/ingresoProveedor')}}" method="post" id="frmIngreso" style="display: none;">
        <input type="hidden" id="ingreso" name="ingreso" value="">
        <input type="hidden" id="token" name="_token" value="{!! csrf_token() !!}">
    </form>
@stop

@section('js')
    {!! Html::script('assets/autocomplete/src/jquery.autocomplete.js') !!}
    {!! Html::script('js/modulos/inventario/trasladoArticulo.js') !!}
@stop
