<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta name="language" content="en"/>

    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
    <link rel="icon" href="public/favicon.ico" type="image/x-icon">

    <title>
        SID {!! isset($tituloPagina)?' | '.$tituloPagina:null !!}
    </title>

    @section('css')
        @include('layout.style')

        <style>
            label {
                width: 100%;
            }
            .input-field label {
                font-size: 0.8rem;
                -webkit-transform: translateY(-140%);
                -moz-transform: translateY(-140%);
                -ms-transform: translateY(-140%);
                -o-transform: translateY(-140%);
                transform: translateY(-140%);
            }
        </style>
    @show
</head>
<body>
<div class="container">
    <div class="row">
        <br><br><br>
        <div class="col m6 offset-m3 teal lighten-5">
            <br>
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="images/sid.png" alt="logo_sid" width="100%">
                </div>
            </div>
            <br>
            <h5 class="center-align blue-text text-darken-4">Iniciar Sesi&oacute;n</h5><br>
            <form class="col s12" id="formLogin" method="POST" action="{{url('/login')}}">
                <div class="row">
                    <div class="input-field col s10 offset-m1">
                        <input id="usuario" name="usuario" type="text" class="validate">
                        <label for="usuario">Usuario</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s10 offset-m1">
                        <input id="clave" name="clave" type="password" class="validate">
                        <label for="clave">Contrase&ntilde;a</label>
                    </div>
                </div>

                <div class="row" style="text-align: center">
                    <button class="btn waves-effect waves-light center submit blue darken-4" type="submit"><i class="fa fa-check-square" aria-hidden="true"></i> INGRESAR</button>
                    {{-- <a class="waves-effect waves-light btn">INGRESAR</a> --}}
                </div>
                <input type="hidden" id="token" name="_token" value="{!! csrf_token() !!}">
            </form>
        </div>
    </div>
</div>
</body>
</html>
@include('layout.script')
@section('js')
    {!! Html::script('js/modulos/login.js') !!}
    <script>
        $(document).ready(function () {

            @if(Session::has('mensaje'))
                new PNotify({
                    title: '{{Session::get('mensaje')['titulo']}}',
                    text: '{{Session::get('mensaje')['msg']}}',
                    type: '{{Session::get('mensaje')['class']}}',
                    icon: false
                });
            @endif
        });
    </script>
@show