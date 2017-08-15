@extends('layout.main')

@section('css')
    {!! Html::style('assets/datatable/css/dataTables.material.min.css') !!}
@stop

@section('contenido')
    <h4 class="blue-text text-darken-4">{{$titulo}}</h4>
    <hr><br>
    <div class="row">
        <form action="{{url('inventario/crearCategoria')}}" method="post">
            <div class="col s12 m7 l7 input-field">
                <input type="text" id="nombre" name="nombre" class="validate" required="" aria-required="true">
                <label for="nombres" data-error="Debe ingresar el Nombre de la Categoría">Nombre Categoría</label>
            </div>
            <div class="col s12 m5 l5">
                <br>
                <button class="waves-effect waves-light btn blue darken-4 secondary-content" type="submit" id="btnCategoria">GUARDAR
                    <i class="material-icons right">save</i>
                </button>
            </div>
            <input type="hidden" id="token" name="_token" value="{!! csrf_token() !!}">
        </form>
    </div>
    <br><hr><br>
    <div class="row">
        @if(isset($dataCategoria)&&count($dataCategoria)>0)
            <table class="bordered" id="tblCategoria">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataCategoria as $dt)
                    <tr>
                        <td>{{$dt->nombre}}</td>
                        <td>{{$dt->estado==1?'Activo':'Inactivo'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@stop

@section('js')
    {!! Html::script('assets/datatable/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/datatable/js/dataTables.material.min.js') !!}
    <script>
        $(document).ready(function () {
            $('.tooltipped').tooltip({delay: 50});

            $('#tblCategoria').DataTable({
                responsive: true,
                lengthChange: false,
                searching: true
            });
        });
    </script>

@stop
