var total = 0;

$(document).ready(function () {
    $('select').material_select();
});

$('#cliente').autocomplete({
    serviceUrl: 'buscarClienteNombre',
    minChars: 2,
    showNoSuggestionNotice: true,
    noSuggestionNotice: 'El cliente no existente',
    onSelect: function (resp) {
        $('#idCliente').val(resp.data);
        $('#documento').val(resp.doc);
        Materialize.updateTextFields();
    },
    onInvalidateSelection: function () {
        $('#idCliente').val('');
        $('#documento').val('');
    }
});

$('#documento').autocomplete({
    serviceUrl: 'buscarClienteDoc',
    minChars: 2,
    showNoSuggestionNotice: true,
    noSuggestionNotice: 'El cliente no existente',
    onSelect: function (resp) {
        $('#idCliente').val(resp.data);
        $('#cliente').val(resp.nom);
        Materialize.updateTextFields();
    },
    onInvalidateSelection: function () {
        $('#idCliente').val('');
        $('#cliente').val('');
        Materialize.updateTextFields();
    }
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
        $('#precio').val(resp.price);
        Materialize.updateTextFields();
    },
    onInvalidateSelection: function () {
        $('#idArticulo, #disponible, #precio').val('');
        Materialize.updateTextFields();
    }
});

$(document).on('click','#btnAgregar',function () {
    var vlArticulo  = $('#idArticulo').val();
    var vlCantidad  = $('#cantidad').val();
    var vlPrecio    = $('#precio').val();

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
        if(vlArticulo!='' && vlCantidad!='')
        {
            var vlMaxArticulo = $('#cantidad').attr('max');

            vlPrecio        = parseFloat(vlPrecio);
            vlCantidad      = parseInt(vlCantidad);
            vlMaxArticulo   = parseInt(vlMaxArticulo);

            if(vlCantidad > 0 && vlCantidad <= vlMaxArticulo)
            {
                var subtotal = vlPrecio * vlCantidad;
                total = total + subtotal;
                var clase = vlArticulo+'|'+vlCantidad;
                var fila = '<tr id="'+vlArticulo+'" class="'+clase+'">';
                fila = fila + '<td style="text-align: center;"><a href="#" onclick="removeFila('+vlArticulo+')"><i class="material-icons">delete_forever</i></td></a>';
                fila = fila + '<td>'+txArticulo+'</td>';
                fila = fila + '<td>'+vlCantidad+'</td>';
                fila = fila + '<td>'+vlPrecio+'</td>';
                fila = fila + '<td id="sub_'+vlArticulo+'">'+subtotal+'</td>';
                fila = fila + '</tr>';

                $('#descripcion, #idArticulo, #disponible, #cantidad, #precio').val('');
                Materialize.updateTextFields();

                var sub = $('#sub_'+vlArticulo).html();

                if(sub === undefined)
                    sub = 0;
                else
                    sub = parseFloat(sub);

                total = total - sub;

                $('#tblIngresos #'+vlArticulo).remove();
                $('#totalFactura').html('Total: Q. '+total);
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
    var sub = $('#sub_'+id).html();
    sub = parseFloat(sub);
    total = total - sub;
    $('#totalFactura').html('Total: Q.'+total);

    $('#tblIngresos #'+id).remove();
    mostrarTabla();
}

function mostrarTabla() {
    var filas =  $("#tblIngresos").find("tr").length;

    if(filas >1)
        $("#divLista").show(500);
    else
    {
        total = 0;
        $("#divLista").hide(500);
    }

}

$(document).on('click','#btnGuardar',function () {
    var ingreso = '';
    var i = 0;

    var vlCliente = $('#idCliente').val();

    if(vlCliente!='')
    {
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
            $('#vlCliente').val(vlCliente);
            console.log('facturando '+ingreso);
            $('#frmFactura').submit();
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
    }
    else
    {
        $.confirm({
            title: 'NO EXISTE CLIENTE',
            content: 'El cliente ingresado no se encuentra registrado en el sistema, ¿Desea crearlo?',
            type: 'red',
            theme: 'dark',
            buttons: {
                no: function () {},
                si: {
                    btnClass: 'btn-red',
                    action: function(){
                        $('#cliente, #documento').val('');
                        window.open('crearCliente');
                    }
                }
            }
        });
    }
});