$(document).ready(function () {
    $('select').material_select();
});

$('#descripcion').autocomplete({
    serviceUrl: 'buscaArticuloLocal',
    minChars: 4,
    showNoSuggestionNotice: true,
    noSuggestionNotice: 'Artículo no existente',
    onSelect: function (resp) {
        $('#idArticulo').val(resp.data);
        $('#disponible').val(resp.count);
        $('#cantidad').attr('max',resp.count);
        Materialize.updateTextFields();
    },
    onInvalidateSelection: function () {
        $('#idArticulo').val('');
        $('#disponible').val('');
        Materialize.updateTextFields();
    }
});

$(document).on('click','#btnAgregar',function () {
    var vlDestino = $('#destino').val();
    var vlArticulo  = $('#idArticulo').val();
    var vlCantidad  = $('#cantidad').val();

    var txProveedor = $('#destino').find('option:selected').text();
    var txArticulo  = $('#descripcion').val();

    if(vlArticulo==''&&txArticulo!='')
    {
        $.confirm({
            title: 'NO EXISTE ARTICULO',
            content: 'El artículo descrito no se encuentra registrado en el sistema, ¿Desea crearlo?',
            type: 'red',
            theme: 'dark',
            buttons: {
                no: function () {},
                si: {
                    btnClass: 'btn-red',
                    action: function(){
                        $('#descripcion').val('');
                        window.open('crearArticulo');
                    }
                }
            }
        });
    }
    else
    {
        if(vlDestino!=null && vlArticulo!='' && vlCantidad!='')
        {
            var vlMaxArticulo = $('#cantidad').attr('max');

            vlCantidad      = parseInt(vlCantidad);
            vlMaxArticulo   = parseInt(vlMaxArticulo);

            if(vlCantidad > 0 && vlCantidad <= vlMaxArticulo)
            {
                var clase = vlDestino+'|'+vlArticulo+'|'+vlCantidad;
                var fila = '<tr id="'+vlArticulo+'" class="'+clase+'">';
                fila = fila + '<td style="text-align: center;"><a href="#" onclick="removeFila('+vlArticulo+')"><i class="material-icons">delete_forever</i></td></a>';
                fila = fila + '<td>'+txArticulo+'</td>';
                fila = fila + '<td>'+vlCantidad+'</td>';
                fila = fila + '</tr>';

                $('#descripcion, #idArticulo, #disponible, #cantidad, #precio').val('');
                $('#destino').prop('disabled',true);
                //$('select').prop('selectedIndex', 0);
                $('select').material_select();
                Materialize.updateTextFields();

                $('#tblIngresos #'+vlArticulo).remove();
                $('#tblIngresos').append(fila);
                mostrarTabla();
            }
            else
            {
                $.alert({
                    title: 'ADVERTENCIA',
                    content: '¡Debe ingresar valores entre 1 y '+vlMaxArticulo+' artículos pues es el máximo disponible en bodega!',
                    type: 'red',
                    theme: 'dark'
                })
            }
        }
        else
        {
            $.alert({
                title: 'ADVERTENCIA',
                content: '¡Es necesario que complete todos los campos!',
                type: 'red',
                theme: 'dark'
            })
        }
    }
});

function removeFila(id) {
    $('#tblIngresos #'+id).remove();
    mostrarTabla();
}

function mostrarTabla() {
    var filas =  $("#tblIngresos").find("tr").length;

    if(filas >1)
        $("#divLista").show(500);
    else
        $("#divLista").hide(500);
}

$(document).on('click','#btnGuardar',function () {
    var ingreso = '';
    var i = 0;
    $("#tblIngresos tbody tr").each(function () {
        var classfila = $(this).attr('class');
        if(i!==0)
            ingreso = ingreso+'+';

        ingreso = ingreso+classfila;
        i++;
    });

    if(ingreso!='')
    {
        $('#ingreso').val(ingreso);
        $('#frmTraslado').submit();
    }
    else
    {
        $.alert({
            title: 'ADVERTENCIA',
            content: '¡Los valores ingresados no son correctos para registrar el traslado de artículos!',
            type: 'red',
            theme: 'dark'
        })
    }
});