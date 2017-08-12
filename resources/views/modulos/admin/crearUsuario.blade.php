@extends('layout.main')
@section('contenido')
    <h4 class="blue-text text-darken-4">{{$titulo}}</h4>
    <hr><br>
    <form action="{{url('admin/crearUsuario')}}" method="POST">
        <div class="row">
            <div class="col s12 m4 l4 input-field">
                <input type="text" class="validate" id="nombres" name="nombres" required>
                <label for="nombres" data-error="Debe ingresar el Nombre">Nombres</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <input type="text" class="validate" id="apellidos" name="apellidos" required>
                <label for="apellidos">Apellidos</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <input type="text" class="datepicker" id="nacimiento" name="nacimiento">
                <label for="nacimiento">Fecha Nacimiento</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m4 l4 input-field">
                <input type="email" class="validate" id="correo" name="correo" required>
                <label for="correo">Correo electrónico</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <select class="validate" id="rol" name="rol" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    @if(isset($selectRol)&&count($selectRol)>0)
                        @foreach($selectRol as $s)
                        <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label>Rol</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <select class="validate" id="tipoUsuario" name="tipoUsuario" required>
                    <option value="" disabled selected>Seleccione una opción</option>
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
            <div class="col s12 m12 l12 input-field">
                <input type="text" class="validate" id="direccion" name="direccion">
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
                    <option value="" disabled selected>Seleccione una opción</option>
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
                <select id="genero" name="genero" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    @if(isset($selectGenero)&&count($selectGenero)>0)
                        @foreach($selectGenero as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="genero">Genero</label>
            </div>
            <div class="col s12 m3 l3 input-field">
                <select id="nacionalidad" name="nacionalidad">
                    <option value="" disabled selected>Seleccione una opción</option>
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
<script>
    $(document).ready(function () {
        $('select').material_select();

        $('.datepicker').pickadate({
            selectMonths: false, // Creates a dropdown to control month
            selectYears: 100, // Creates a dropdown of 15 years to control year,
            today: 'Hoy',
            clear: 'Limpiar',
            close: 'Aceptar',
            closeOnSelect: true, // Close upon selecting a date,
            format: 'dd/mm/yyyy',

            monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
            monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
            weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado' ],
            weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ],

            weekdaysLetter: [ 'D', 'L', 'M', 'X', 'J', 'V', 'S' ]
        });
    })

</script>

@stop
