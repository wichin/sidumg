@extends('layout.main')
@section('contenido')
    <h4 class="blue-text text-darken-4">{{$titulo}}</h4>
    <hr><br>

    <form action="{{url('inventario/crearArticulo')}}" method="post" id="frmArticulo">
        <div class="row">
            <div class="input-field col s12 m3 l3">
                <i class="material-icons prefix">Q</i>
                <input type="number" class="validate" id="precio" name="precio" required>
                <label for="precio" data-error="Debe ingresar el valor del artículo">Precio Venta</label>
            </div>
            <div class="input-field col s12 m9 l9">
                <input type="text" class="validate" id="descripcion" name="descripcion" disabled>
                <label for="descripcion">Descripción</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m4 l4 input-field">
                <select id="categoria" name="categoria">
                    <option value="" disabled selected>Seleccione una opción</option>
                    @if(isset($selectCategoria)&&count($selectCategoria)>0)
                        @foreach($selectCategoria as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="categoria">Categoría</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <select id="deporte" name="deporte">
                    <option value="" disabled selected>Seleccione una opción</option>
                    @if(isset($selectDeporte)&&count($selectDeporte)>0)
                        @foreach($selectDeporte as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="deporte">Deporte</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <select id="marca" name="marca">
                    <option value="" disabled selected>Seleccione una opción</option>
                    @if(isset($selectMarca)&&count($selectMarca)>0)
                        @foreach($selectMarca as $s)
                            <option value="{{$s->id}}">{{$s->nombre_comercial}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="marca">Marca</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m4 l4 input-field">
                <select id="genero" name="genero">
                    <option value="" disabled selected>Seleccione una opción</option>
                    @if(isset($selectGenero)&&count($selectGenero)>0)
                        @foreach($selectGenero as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="genero">Genero</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <select id="color" name="color">
                    <option value="" disabled selected>Seleccione una opción</option>
                    @if(isset($selectColor)&&count($selectColor)>0)
                        @foreach($selectColor as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="color">Color</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <select id="talla" name="talla">
                    <option value="" disabled selected>Seleccione una opción</option>
                    @if(isset($selectTalla)&&count($selectTalla)>0)
                        @foreach($selectTalla as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="talla">Talla</label>
            </div>
        </div>
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

        <input type="hidden" id="token" name="_token" value="{!! csrf_token() !!}">
    </form>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('.tooltipped').tooltip({delay: 50});
            $('select').material_select();
            $('#descripcion').val('Zapatos');
        });

        $(document).on('click','#btnCategoria',function (e)
        {
            e.preventDefault();
            $.confirm({
                icon: 'fa fa-question',
                title: 'CREAR ARTICULO',
                content: '¿Confirma que desea crear una nueva Categoría?',
                theme: 'modern',
                type: 'blue',
                columnClass: 'col s4 m4 l4 offset-s4 offset-m4 offset-l4',
                buttons: {
                    Cancelar: function () {},
                    Aceptar: {
                        text: 'Aceptar',
                        btnClass: 'btn-blue',
                        action: function(){
                            $('#frmArticulo').submit();
                        }
                    }
                }
            });
        });
    </script>

@stop
