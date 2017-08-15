@extends('layout.main')

@section('css')
    {!! Html::style('assets/datatable/css/dataTables.material.min.css') !!}
@stop

@section('contenido')
    <h4 class="blue-text text-darken-4">{{$titulo}}</h4>
    <hr><br>
    <div class="row">
        @if(isset($dataUsuario)&&count($dataUsuario)>1)
            <table class="bordered" id="tblUsuarios">
                <thead>
                <tr>
                    <th>Acción</th>
                    <th>Estado</th>
                    <th>Nombre</th>
                    <th>Local</th>
                    <th>Correo</th>
                    <th>Tipo</th>
                    <th>Rol</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($dataUsuario as $dt)
                        <tr>
                            <td>
                                @if($dt->EstadoUsuario->id==1)
                                    <a class="tooltipped" href="#" onclick="ChangeStatus({{'2,'.$dt->id}})" data-position="right" data-tooltip="Desactivar">
                                        <i class="material-icons">block</i>
                                    </a>
                                @elseif($dt->EstadoUsuario->id==2)
                                    <a class="tooltipped" href="#" onclick="ChangeStatus({{'1,'.$dt->id}})" data-position="right" data-tooltip="Activar">
                                        <i class="material-icons">check_circle</i>
                                    </a>
                                @else
                                    <a class="tooltipped" href="#" onclick="ChangeStatus({{'1,'.$dt->id}})" data-position="right" data-tooltip="Sin acciones">
                                        <i class="material-icons">access_time</i>
                                    </a>
                                @endif
                            </td>
                            <td>{{$dt->EstadoUsuario->nombre}}</td>
                            <td>{{$dt->Persona->nombres.' '.$dt->Persona->apellidos}}</td>
                            <td>{{$dt->Local->nombre}}</td>
                            <td>{{$dt->correo}}</td>
                            <td>{{$dt->TipoUsuario->nombre}}</td>
                            <td>{{$dt->Rol->nombre}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h4><i class="material-icons">info</i> No se encuentran usuarios registrados.</h4>
        @endif
    </div>
    <form action="{{url('admin/cambioEstado')}}" method="POST" id="formEstado" style="display: none;">
        <input type="hidden" id="token" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" id="usr" name="usr">
        <input type="hidden" id="sta" name="sta">
    </form>
@stop

@section('js')
    {!! Html::script('assets/datatable/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/datatable/js/dataTables.material.min.js') !!}
    <script>
        $(document).ready(function () {
            $('.tooltipped').tooltip({delay: 50});

            $('#tblUsuarios').DataTable({
                responsive: true,
                lengthChange: false,
                searching: false
            });
        });

        function ChangeStatus(sta, usr) {
            $.confirm({
                icon: 'fa fa-question',
                title: 'CAMBIO DE ESTADO',
                content: '¿Desea actualizar el estado del Usuario?',
                theme: 'modern',
                type: 'blue',
                columnClass: 'col s4 m4 l4 offset-s4 offset-m4 offset-l4',
                buttons: {
                    Cancelar: function () {

                    },
                    Aceptar: {
                        text: 'Aceptar',
                        btnClass: 'btn-blue',
                        action: function(){
                            $('#sta').val(sta);
                            $('#usr').val(usr);
                            $('#formEstado').submit();
                        }
                    }
                }
            });
        }
    </script>

@stop
