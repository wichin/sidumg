<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta name="language" content="en"/>
    <link rel="shortcut icon" href="{!!asset('images/favicon.ico')!!}" type="image/x-icon">
    <link rel="icon" href="{!!asset('images/favicon.ico')!!}" type="image/x-icon">

    <title>
        SID {!! isset($tituloPagina)?' | '.$tituloPagina:null !!}
    </title>

    @include('layout.style')

    @section('css')
    @show

    <style>
        .max-container {
            padding-left: 25px;
            padding-right: 25px;
        }

        header, main, footer {
            padding-left: 300px;
        }

        @media only screen and (max-width : 992px) {
            header, main, footer {
                padding-left: 0;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only">
            <i class="material-icons">menu</i></a>
    </div>
    <ul id="nav-mobile" class="side-nav fixed">
        <li class="bold">
            <a href="{{url('inicio')}}" class="waves-effect waves-teal">
                <i class="fa fa-home fa-lg"></i>Inicio
            </a>
        </li>
        <li class="bold">
            <a href="#" class="waves-effect waves-teal">
                <i class="fa fa-user fa-lg"></i>Perfil
            </a>
        </li>
        @if(isset($usuario['menu'])&&count($usuario['menu'])>0)

        <li class="li-hover"><div class="divider"></div></li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                @foreach($usuario['menu'] as $item)

                <li class="bold">
                    <a class="collapsible-header waves-effect waves-teal">
                        <i class="{{$item[0]->clase}} fa-lg"></i>{{$item[0]->nomModulo}}
                    </a>
                    <div class="collapsible-body" style="padding: 0;">
                        <ul>
                            @foreach($item as $menu)
                            <li><a href="{{url($menu->url)}}">{{$menu->nomMenu}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>

                @endforeach
            </ul>
        </li>

        @endif
    </ul>
</header>

<main>
    <div class="{{isset($isLarge)&&$isLarge?'max-container':'container'}}">
        <div class="row">
            <div class="section col s12 m12 l12">
                @section('contenido')
                @show
            </div>
        </div>
    </div>
</main>

<footer class="page-footer">
    <div class="container">
        <div class="row">
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2017 UMG, Ingeniería en Sistemas.
            <a class="grey-text text-lighten-4 right" href="https://github.com/Dogfalo/materialize/blob/master/LICENSE">MIT License</a>
        </div>
    </div>
</footer>

</body>


</html>
@include('layout.script')

<script>
$(document).ready(function () {
    $(".button-collapse").sideNav();

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


@section('js')
@show

