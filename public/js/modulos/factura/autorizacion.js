$(document).ready(function () {
    $('select').material_select();

    $("select[required]").css({
        display: "inline",
        height: 0,
        padding: 0,
        width: 0
    });

    $('.datepicker').pickadate({
        selectMonths: false, // Creates a dropdown to control month
        selectYears: 10, // Creates a dropdown of 15 years to control year,
        today: 'Hoy',
        clear: 'Limpiar',
        close: 'Aceptar',
        closeOnSelect: true, // Close upon selecting a date,
        format: 'dd/mm/yyyy',

        monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
        monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
        weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado' ],
        weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ],

        weekdaysLetter: [ 'D', 'L', 'M', 'X', 'J', 'V', 'S' ]
    });
});