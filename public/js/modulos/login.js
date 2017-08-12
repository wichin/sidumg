$(document).ready(function () {
    $.validator.setDefaults({
        errorClass: 'invalid',
        validClass: "valid",
        errorPlacement: function (error, element) {
            $(element)
                .closest("form")
                .find("label[for='" + element.attr("id") + "']")
                .attr('data-error', error.text());
        },
        submitHandler: function (form) {
            $.dialog({
                icon: 'fa fa-circle-o-notch',
                columnClass: 'col s4 m4 l4 offset-s4 offset-m4 offset-l4',
                title: 'AUTENTICACION',
                content: 'Procesando Información...',
                type: 'blue',
                theme: 'modern'
            });
            form.submit();
        }
    });

    $("#formLogin").validate({
        rules: {
            usuario: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            usuario: {
                required: 'El campo Usuario es necesario.'
            },
            password: {
                required: 'El campo Contraseña es necesario'
            }
        }
    });
});