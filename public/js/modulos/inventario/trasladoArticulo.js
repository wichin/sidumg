$(document).ready(function () {
    $('select').material_select();
});

$('#descripcion').autocomplete({
    serviceUrl: 'buscaArticuloBodega',
    minChars: 4,
    showNoSuggestionNotice: true,
    noSuggestionNotice: 'Artículo no existente',
    onSelect: function (resp) {
        $('#idArticulo').val(resp.data);
        $('#cantidad').attr('max',resp.count);
    },
    onInvalidateSelection: function () {
        $('#idArticulo').val('');
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
        if(vlDestino!='' && vlArticulo!='' && vlCantidad!='')
        {
            var clase = vlDestino+'|'+vlArticulo+'|'+vlCantidad;
            var fila = '<tr id="'+vlArticulo+'" class="'+clase+'">';
            fila = fila + '<td style="text-align: center;"><a href="#" onclick="removeFila('+vlArticulo+')"><i class="material-icons">delete_forever</i></td></a>';
            fila = fila + '<td>'+txArticulo+'</td>';
            fila = fila + '<td>'+vlCantidad+'</td>';
            fila = fila + '</tr>';

            $('#descripcion, #idArticulo, #cantidad, #precio').val('');
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
        $('#frmIngreso').submit();
    }
    else
    {
        $.alert({
            title: 'ADVERTENCIA',
            content: '¡Los valores ingresados no son correctos para registrar el ingreso de nuevos artículos!',
            type: 'red',
            theme: 'dark'
        })
    }
});