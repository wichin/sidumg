@extends('layout.main')

@section('css')
    {!! Html::style('assets/datatable/css/dataTables.material.min.css') !!}
@stop

@section('contenido')
    <div class="row">
        <div class="col s11 m11 l11">
            <h4 class="blue-text text-darken-4">{{$titulo}}</h4>
        </div>
        <div class="col s1 m1 l1 right valign-wrapper">
            <br>
            <a href="#" onclick="showData()" style="padding-top: 10px; padding-bottom: 0;" class="tooltipped" data-position="left" data-tooltip="Nuevo Local">
                <i class="medium material-icons">home</i>
            </a>
        </div>
    </div>
    <hr><br>

    <div id="divCrear" hidden>
        <form action="{{url('admin/gestionLocal')}}" method="post">
            <div class="row">
                <div class="col s12 m6 l6 input-field">
                    <input type="text" id="nombre" name="nombre" class="validate" required="" aria-required="true">
                    <label for="nombre">Nombre</label>
                </div>
                <div class="col s12 m6 l6 input-field">
                    <input type="text" id="direccion" name="direccion" class="validate" required="" aria-required="true">
                    <label for="direccion">Direccion</label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col s12 m3 l3 input-field">
                    <input type="text" id="telefono" name="telefono" class="validate" required="" aria-required="true">
                    <label for="telefono">Telefono</label>
                </div>
                <div class="col s12 m5 l5 input-field">
                    <select id="empresa" name="empresa"  class="validate" required="" aria-required="true">
                        <option value="" disabled selected>Seleccione...</option>
                        @if(isset($selectEmpresa)&&count($selectEmpresa)>0)
                            @foreach($selectEmpresa as $s)
                                <option value="{{$s->id}}">{{$s->nombre}}</option>
                            @endforeach
                        @endif
                    </select>
                    <label for="empresa">Empresa</label>
                </div>
                <div class="col s12 m4 l4 input-field">
                    <select id="tipoLocal" name="tipoLocal" class="validate" required="" aria-required="true">
                        <option value="" disabled selected>Seleccione...</option>
                        @if(isset($selectTipoLocal)&&count($selectTipoLocal)>0)
                            @foreach($selectTipoLocal as $s)
                                <option value="{{$s->id}}">{{$s->nombre}}</option>
                            @endforeach
                        @endif
                    </select>
                    <label for="tipoLocal">Tipo de Local</label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col s12 m12 l12 input-field">
                    <button class="waves-effect waves-light btn" type="button" id="btnCancelar" name="btnCancelar">CANCELAR
                        <i class="material-icons right">clear</i>
                    </button>
                    <button class="waves-effect waves-light btn blue darken-4 secondary-content" type="submit" id="btnArticulo">ACEPTAR
                        <i class="material-icons right">check</i>
                    </button>
                </div>
            </div>

            <input type="hidden" id="token" name="_token" value="{!! csrf_token() !!}">
        </form>
    </div>
    <div id="divVer">
        @if(count($dataLocal)>0)
            <table class="bordered" id="tblLocal">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Tipo</th>
                    <th>Empresa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataLocal as $dl)
                    <tr>
                        <td>{{$dl->nombre}}</td>
                        <td>{{$dl->direccion}}</td>
                        <td>{{$dl->telefono}}</td>
                        <td>{{$dl->TipoLocal->nombre}}</td>
                        <td>{{$dl->Empresa->nombre}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div style="text-align: center;">
                <i class="medium material-icons">warning</i>
                <h5>NO EXISTEN LOCALES REGISTRADOS</h5>
            </div>
        @endif

    </div>

@stop

@section('js')
    {!! Html::script('assets/datatable/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/datatable/js/dataTables.material.min.js') !!}
    {!! Html::script('js/modulos/admin/gestionLocal.js') !!}
@stop
