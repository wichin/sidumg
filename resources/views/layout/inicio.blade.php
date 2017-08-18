@extends('layout.main')

@section('css')

@stop


@section('contenido')
    <div class="row">
        <div class="col s12 m12 l12" id="divSerial" style="height: 400px; width: 100%;">
        </div>
    </div>

    <div class="row">
        <div class="col s12 m12 l12" id="divPie" style="height: 500px; width: 100%;">
        </div>
    </div>



@stop

@section('js')
    {!! Html::script(asset('/assets/amcharts/amcharts.js')) !!}
    {!! HTML::script(asset('/assets/amcharts/pie.js')) !!}
    {!! HTML::script(asset('/assets/amcharts/serial.js')) !!}
    {!! HTML::script(asset('/assets/amcharts/themes/light.js')) !!}
    {!! HTML::script(asset('/assets/amcharts/themes/dark.js')) !!}
    {{--
    {!! HTML::script(asset('/assets/amcharts2/plugins/export/export.js')) !!}
    --}}
    <script>
        var chart = AmCharts.makeChart("divPie", {
            "type": "pie",
            "titles": [{
                "text": 'Venta de Articulos',
                "size": 20,
                "color":"#19117C"
            }],
            "startDuration": 0,
            "theme": "light",
            "addClassNames": true,
            "legend":{
                "align":"center",
                "position":"bottom",
                "markerLabelGap": 5,
                "spacing":75,
                "autoMargins":true,
                "color":"#544335"
            },
            "defs": {
                "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
            },
            "dataProvider": [ {
                "Articulo": "Camisolas",
                "Ventas": 320
            }, {
                "Articulo": "Zapatos",
                "Ventas": 144
            }, {
                "Articulo": "Maletines",
                "Ventas": 217
            }, {
                "Articulo": "Chaquetas",
                "Ventas": 188
            }],
            "valueField": "Ventas",
            "titleField": "Articulo",
            "outlineAlpha": 0.4,
            "depth3D": 15,
            "angle": 40,
            "color":"#544335",
            "lineColor":"#544335",
            "labelTickColor":"#000000",
            "labelTickOpacity":1,
            "export": {
                "enabled": true
            }
        });

        chart.addListener("init", handleInit);
        chart.marginTop = 5;
        chart.addListener("rollOverSlice", function(e) {
            handleRollOver(e);
        });

        function handleInit(){
            chart.legend.addListener("rollOverItem", handleRollOver);
        }

        function handleRollOver(e){
            var wedge = e.dataItem.wedge.node;
            wedge.parentNode.appendChild(wedge);
        }

        var chart2 = AmCharts.makeChart("divSerial", {
            "type": "serial",
            "theme": "light",
            "categoryField": "mes",
            "rotate": true,
            "startDuration": 1,
            "legend":{
                "align":"center",
                "position":"bottom",
                "markerLabelGap": 5,
                "spacing":75,
                "autoMargins":true,
                "color":"#544335"
            },
            "categoryAxis": {
                "gridPosition": "start",
                "position": "left"
            },
            "trendLines": [],
            "graphs": [
                {
                    "balloonText": "Income:[[value]]",
                    "fillAlphas": 0.8,
                    "id": "AmGraph-1",
                    "lineAlpha": 0.2,
                    "title": "Income",
                    "type": "column",
                    "valueField": "income"
                },
                {
                    "balloonText": "Expenses:[[value]]",
                    "fillAlphas": 0.8,
                    "id": "AmGraph-2",
                    "lineAlpha": 0.2,
                    "title": "Expenses",
                    "type": "column",
                    "valueField": "expenses"
                }
            ],
            "guides": [],
            "valueAxes": [
                {
                    "id": "ValueAxis-1",
                    "position": "top",
                    "axisAlpha": 0
                }
            ],
            "allLabels": [],
            "balloon": {},
            "titles": [{
                "text": 'Metas Trimestrales',
                "size": 20,
                "color":"#19117C"
            }],
            "dataProvider": [
                {
                    "mes": "Agosto",
                    "income": 23.5,
                    "expenses": 18.1
                },
                {
                    "mes": "Septiembre",
                    "income": 26.2,
                    "expenses": 22.8
                }
            ],
            "export": {
                "enabled": true
            }

        });


    </script>
@stop
