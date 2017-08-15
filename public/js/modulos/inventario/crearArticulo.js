$(document).ready(function () {
    $('.tooltipped').tooltip({delay: 50});
    $('select').material_select();

    $("select[required]").css({
        display: "inline",
        height: 0,
        padding: 0,
        width: 0
    });
});

$(document).on('change','.data-articulo', function () {
    var validacion = $(this).val()

    var cadena = '';
    var txCat = $('#categoria').find('option:selected').text();
    var txDep = $('#deporte').find('option:selected').text();
    var txMar = $('#marca').find('option:selected').text();
    var txGen = $('#genero').find('option:selected').text();
    var txCol = $('#color').find('option:selected').text();
    var txTll = $('#talla').find('option:selected').text();

    if(txCat!=''&&txDep!=''&&txMar!=''&&txGen!=''&&txCol!=''&&txTll!='')
    {
        cadena = txCat+'-'+txDep+' '+txMar+' '+txCol+' '+txGen+'-'+txTll;
    }

    $('#desc-visible, #descripcion').val(cadena);
    Materialize.updateTextFields();
});