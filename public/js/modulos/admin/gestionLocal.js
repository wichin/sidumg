$(document).ready(function () {
    $('.tooltipped').tooltip({delay: 50});
    $('select').material_select();

    $("select[required]").css({
        display: "inline",
        height: 0,
        padding: 0,
        width: 0
    });

    $('#tblLocal').DataTable({
        responsive: true,
        lengthChange: false,
        searching: false
    });
});

function showData() {
    $('#divCrear').show(500);
    $('#divVer').hide(500);
}
/*
$(document).on('click','#showData',function () {
    $('#divCrear').show(500);
    $('#divVer').hide(500);
});
*/
$(document).on('click','#btnCancelar',function () {
    $('#divCrear').hide(500);
    $('#divVer').show(500);
});