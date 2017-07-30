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
            $.alert({
                title: 'Alert!',
                content: 'Simple alert!',
            });
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