@extends('layout.main')
@section('contenido')
    <h4 class="blue-text text-darken-4">{{$titulo}}</h4>
    <hr><br>

    <form action="{{url('inventario/crearArticulo')}}" method="post">
        <div class="row">
            <div class="input-field col s12 m3 l3">
                <i class="material-icons prefix">Q</i>
                <input type="number" id="precio" name="precio" class="validate" required="" aria-required="true">
                <label for="precio" data-error="Debe ingresar el valor del artículo">Precio Venta</label>
            </div>
            <div class="input-field col s12 m9 l9">
                <input type="text" id="desc-visible" name="desc-visible" style="color: black;" disabled>
                <input type="hidden" id="descripcion" name="descripcion">
                <label class="active">Descripción</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m4 l4 input-field">
                <select class="data-articulo" id="categoria" name="categoria" class="validate" required="" aria-required="true">
                    <option value="" disabled selected></option>
                    @if(isset($selectCategoria)&&count($selectCategoria)>0)
                        @foreach($selectCategoria as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="categoria">Categoría</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <select class="data-articulo" id="deporte" name="deporte" class="validate" required="" aria-required="true">
                    <option value="" disabled selected></option>
                    @if(isset($selectDeporte)&&count($selectDeporte)>0)
                        @foreach($selectDeporte as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="deporte">Deporte</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <select class="data-articulo" id="marca" name="marca" class="validate" required="" aria-required="true">
                    <option value="" disabled selected></option>
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
                <select class="data-articulo" id="genero" name="genero" class="validate" required="" aria-required="true">
                    <option value="" disabled selected></option>
                    @if(isset($selectGenero)&&count($selectGenero)>0)
                        @foreach($selectGenero as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="genero">Genero</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <select class="data-articulo" id="color" name="color" class="validate" required="" aria-required="true">
                    <option value="" disabled selected></option>
                    @if(isset($selectColor)&&count($selectColor)>0)
                        @foreach($selectColor as $s)
                            <option value="{{$s->id}}">{{$s->nombre}}</option>
                        @endforeach
                    @endif
                </select>
                <label for="color">Color</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                <select class="data-articulo" id="talla" name="talla" class="validate" required="" aria-required="true">
                    <option value="" disabled selected></option>
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
                <button class="waves-effect waves-light btn blue darken-4 secondary-content" type="submit" id="btnArticulo">ACEPTAR
                    <i class="material-icons right">check</i>
                </button>
            </div>
        </div>

        <input type="hidden" id="token" name="_token" value="{!! csrf_token() !!}">
    </form>
@stop

@section('js')
    {!! Html::script('js/modulos/inventario/crearArticulo.js') !!}
@stop
