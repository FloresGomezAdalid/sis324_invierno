$(document).ready(function() {
    $('#nuevaCarreraBtn').click(function(e) {
        e.preventDefault();
        cargarContenido('nueva_carrera.php');
    });

    $('#registroCocheBtn').click(function(e) {
        e.preventDefault();
        cargarContenido('registro_coche.php');
    });

    $('#registroVueltaBtn').click(function(e) {
        e.preventDefault();
        cargarContenido('registro_vuelta.php');
    });

    $('#verResultadosBtn').click(function(e) {
        e.preventDefault();
        cargarContenido('ver_resultados.php');
    });
});

function cargarContenido(url) {
    $.ajax({
        url: url,
        method: 'GET',
        success: function(data) {
            $('#contenidoPrincipal').html(data);
        },
        error: function() {
            alert('Error al cargar el contenido');
        }
    });
}

function enviarFormulario(formId, url) {
    $('#' + formId).submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: url,
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
                $('#' + formId)[0].reset();
            },
            error: function() {
                alert('Error al enviar el formulario');
            }
        });
    });
}