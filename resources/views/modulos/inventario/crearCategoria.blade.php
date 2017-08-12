@extends('layout.main')
@section('contenido')
    <h4 class="blue-text text-darken-4">{{$titulo}}</h4>
    <hr><br>
    <div class="row">
        <form action="{{url('inventario/crearCategoria')}}" method="post" id="frmCategoria">
            <div class="col s12 m7 l7 input-field">
                <input type="text" class="validate" id="nombre" name="nombre" required>
                <label for="nombres" data-error="Debe ingresar el Nombre de la Categoría">Nombre Categoría</label>
            </div>
            <div class="col s12 m5 l5">
                <br>
                <button class="waves-effect waves-light btn blue darken-4 secondary-content" type="button" id="btnCategoria">GUARDAR
                    <i class="material-icons right">save</i>
                </button>
            </div>
            <input type="hidden" id="token" name="_token" value="{!! csrf_token() !!}">
        </form>
    </div>
    <div class="row">
        @if(isset($dataCategoria)&&count($dataCategoria)>0)
            <table class="responsive-table bordered">
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
    <script>
        $(document).ready(function () {
            $('.tooltipped').tooltip({delay: 50});
        });

        $(document).on('click','#btnCategoria',function (e)
        {
            e.preventDefault();
            $.confirm({
                icon: 'fa fa-question',
                title: 'CREAR CATEGORIA',
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
                            $('#frmCategoria').submit();
                        }
                    }
                }
            });
        });
    </script>

@stop
