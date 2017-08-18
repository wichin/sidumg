@extends('layout.main')

@section('css')
    {!! Html::style('assets/autocomplete/content/styles.css') !!}
@stop


@section('contenido')
    <h4 class="blue-text text-darken-4">{{$titulo}}</h4>
    <hr><br>

    <div id="divCliente">
        <div class="row">
            <div class="col s12 m6 l6 input-field">
                <input type="text" id="cliente" name="cliente">
                <label class="active">Cliente</label>
            </div>
            <div class="col s12 m3 l3 input-field">
                <input type="text" id="documento" name="documento">
                <label class="active">Documento</label>
            </div>
            <input type="hidden" id="idCliente" name="idCliente">
            <div class="col s12 m3 l3 input-field">
                <select id="tipoCobro" name="tipoCobro">
                    <option value="" disabled selected></option>
                    @if(isset($selectTipoC)&&count($selectTipoC)>0)
                        @foreach($selectTipoC as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="tipoCobro">Tipo de Cobro</label>
            </div>
        </div>
    </div>
    <br>
    <div id="divArticulo">
        <div class="row">
            <div class="col s12 m4 l4 input-field">
                <input type="text" id="descripcion" name="descripcion">
                <input type="hidden" id="idArticulo" name="idArticulo">
                <label class="active">Artículo</label>
            </div>
            <div class="col s6 m2 l2 input-field">
                <input type="number" id="cantidad" name="cantidad" min="1">
                <label>Cantidad</label>
            </div>
            <div class="col s6 m2 l2 input-field">
                <input type="number" id="disponible" name="disponible" readonly style="background: white;">
                <label>Disponible</label>
            </div>

            <div class="col s6 m2 l2 input-field">
                <input type="number" id="precio" name="precio" readonly style="background: white;">
                <label>Precio</label>
            </div>

            <div class="col s12 m2 l2">
                <br>
                <button class="waves-effect waves-light btn secondary-content" type="button" id="btnAgregar">
                    AGREGAR<i class="material-icons right">control_point</i>
                </button>
            </div>
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
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col s12 m6 l6">
                <h5 id="totalFactura"></h5>
            </div>
            <button class="waves-effect waves-light btn blue darken-4 secondary-content" type="button" id="btnGuardar">
                CONFIRMAR <i class="material-icons right">check</i>
            </button>
        </div>
    </div>

    <form action="{{url('factura/crearFactura')}}" method="post" id="frmFactura" style="display: none;">
        <input type="hidden" id="ingreso" name="ingreso" value="">
        <input type="hidden" id="vlCliente" name="vlCliente">
        <input type="hidden" id="vlCobro" name="vlCobro">
        <input type="hidden" id="token" name="_token" value="{!! csrf_token() !!}">
    </form>
@stop

@section('js')
    {!! Html::script('assets/autocomplete/src/jquery.autocomplete.js') !!}
    {!! Html::script('js/modulos/factura/nuevaFactura.js') !!}
@stop
