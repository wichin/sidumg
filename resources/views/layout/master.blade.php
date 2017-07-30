<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta name="language" content="en"/>

    <title>
        SID {!! isset($tituloPagina)?' | '.$tituloPagina:null !!}
    </title>

    @section('css')
        @include('layout.style')
    @show
    <style>
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
    <div class="container">
        <div class="row">
            <ul id="slide-out" class="side-nav">
                <li><a href="#!">First Sidebar Link</a></li>
                <li><a href="#!">Second Sidebar Link</a></li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a class="collapsible-header">Dropdown<i class="material-icons">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#">First</a></li>
                                    <li><a href="#">Second</a></li>
                                    <li><a href="#">Third</a></li>
                                    <li><a href="#">Fourth</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">First Sidebar Link</a></li>
                <li><a href="#">Second Sidebar Link</a></li>
                <li><a class="dropdown-button" href="#" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
                <ul id='dropdown1' class='dropdown-content'>
                    <li><a href="#">First</a></li>
                    <li><a href="#">Second</a></li>
                    <li><a href="#">Third</a></li>
                    <li><a href="#">Fourth</a></li>
                </ul>
            </ul>
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </div>
</body>
</html>
@include('layout.script')
@section('js')
    <script>
        $(document).ready(function () {
            $(".button-collapse").sideNav();
        });
    </script>
@show