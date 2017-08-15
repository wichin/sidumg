@extends('layout.main')
@section('contenido')
    <h4 class="blue-text text-darken-4">{{$titulo}}</h4>
    <hr><br>
    <form action="{{url('admin/crearUsuario')}}" method="POST">
        <div class="row">
            <div class="col s12 m4 l4 input-field">
                <input type="text" id="nombres" name="nombres" class="validate" required="" aria-required="true">
                <label for="nombres" data-error="Debe ingresar el Nombre">Nombres</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <input type="text" id="apellidos" name="apellidos" class="validate" required="" aria-required="true">
                <label for="apellidos">Apellidos</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <input type="text" class="datepicker" id="nacimiento" name="nacimiento">
                <label for="nacimiento">Fecha Nacimiento</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m4 l4 input-field">
                <input type="email" id="correo" name="correo" class="validate" required="" aria-required="true">
                <label for="correo">Correo electrónico</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <select id="rol" name="rol" class="validate" required="" aria-required="true">
                    <option value="" disabled selected>Seleccione...</option>
                    @if(isset($selectRol)&&count($selectRol)>0)
                        @foreach($selectRol as $s)
                        <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label>Rol</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <select id="tipoUsuario" name="tipoUsuario" class="validate" required="" aria-required="true">
                    <option value="" disabled selected>Seleccione...</option>
                    @if(isset($selectTipoUsuario)&&count($selectTipoUsuario)>0)
                        @foreach($selectTipoUsuario as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="tipoUsuario">Tipo de Usuario</label>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m4 l4 input-field">
                <select id="local" name="local" class="validate" required="" aria-required="true">
                    <option value="" disabled selected>Seleccione...</option>
                    @if(isset($selectLocal)&&count($selectLocal)>0)
                        @foreach($selectLocal as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="local">Local</label>
            </div>
            <div class="col s8 m8 l8 input-field">
                <input type="text" id="direccion" name="direccion">
                <label for="direccion">Direcci&oacute;n</label>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m4 l4 input-field">
                <input type="text" id="nit" name="nit">
                <label for="nit">Nit</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <input type="text" id="documento" name="documento">
                <label for="documento">Documento</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <select id="tipoDocumento" name="tipoDocumento">
                    <option value="" disabled selected>Seleccione...</option>
                    @if(isset($selectTipoDoc)&&count($selectTipoDoc)>0)
                        @foreach($selectTipoDoc as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="tipoDocumento">Tipo de Documento</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m3 l3 input-field">
                <select id="genero" name="genero" class="validate" required="" aria-required="true">
                    <option value="" disabled selected>Seleccione una opción...</option>
                    @if(isset($selectGenero)&&count($selectGenero)>0)
                        @foreach($selectGenero as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label>Genero</label>
            </div>
            <div class="col s12 m3 l3 input-field">
                <select id="nacionalidad" name="nacionalidad">
                    <option value="" disabled selected>Seleccione...</option>
                    @if(isset($selectNac)&&count($selectNac)>0)
                        @foreach($selectNac as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="nacionalidad">nacionalidad</label>
            </div>
            <div class="col s12 m3 l3 input-field">
                <input type="number" id="celular" name="celular">
                <label for="celular">Celular</label>
            </div>
            <div class="col s12 m3 l3 input-field">
                <input type="number" id="telefono" name="telefono">
                <label for="telefono">Teléfono Domicilio</label>
            </div>
        </div>

        <input type="hidden" id="token" name="_token" value="{!! csrf_token() !!}">

        <div class="row">
            <div class="col s12 m12 l12 input-field">
                <button class="waves-effect waves-light btn" type="button" id="clean" name="clean">LIMPIAR
                    <i class="material-icons right">clear</i>
                </button>
                <button class="waves-effect waves-light btn blue darken-4 secondary-content" type="submit" name="action">ACEPTAR
                    <i class="material-icons right">check</i>
                </button>
            </div>
        </div>
    </form>
@stop

@section('js')
    {!! Html::script('js/modulos/admin/crearUsuario.js') !!}
@stop
