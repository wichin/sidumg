@extends('layout.main')
@section('contenido')
    <h4 class="blue-text text-darken-4">{{$titulo}}</h4>
    <hr><br>
    <form action="{{url('factura/agregarAutorizacion')}}" method="POST">
        <div class="row">
            <div class="col s12 m8 l8 input-field">
                <input type="text" id="resolucion" name="resolucion" class="validate" required="" aria-required="true">
                <label for="resolucion">Resoluci&oacute;n</label>
            </div>

            <div class="col s12 m4 l4 input-field">
                <input type="text" class="datepicker" id="fecha" name="fecha" class="validate" required="" aria-required="true">
                <label for="fecha">Fecha Vencimiento</label>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m3 l3 input-field">
                <input type="number" id="valor_inicial" name="valor_inicial" class="validate" required="" aria-required="true">
                <label>Rango del</label>
            </div>
            <div class="col s12 m3 l3 input-field">
                <input type="number" id="valor_final" name="valor_final" class="validate" required="" aria-required="true">
                <label>Al</label>
            </div>
            <div class="col s12 m3 l3 input-field">
                <input type="text" id="serie" name="serie" class="validate" required="" aria-required="true">
                <label>Serie</label>
            </div>
            <div class="col s12 m3 l3 input-field">
                <select class="data-articulo" id="local" name="local" class="validate" required="" aria-required="true">
                    <option value="" disabled selected></option>
                    @if(isset($selectLocal)&&count($selectLocal)>0)
                        @foreach($selectLocal as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="local">Punto de Venta</label>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12 l12 input-field">
                <button class="waves-effect waves-light btn" type="button" id="btnClean">LIMPIAR
                    <i class="material-icons right">clear</i>
                </button>
                <button class="waves-effect waves-light btn blue darken-4 secondary-content" type="submit">GUARDAR
                    <i class="material-icons right">save</i>
                </button>
            </div>
        </div>
        <input type="hidden" id="token" name="_token" value="{!! csrf_token() !!}">
    </form>
@stop

@section('js')
    {!! Html::script('js/modulos/factura/autorizacion.js') !!}
@stop
