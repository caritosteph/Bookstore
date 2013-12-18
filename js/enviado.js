function onSubmit() {
    bootbox.dialog({
        message: "Su mensaje fue enviado correctamente",
        title: "MENSAJE ENVIADO",
        buttons: {
            success: {
                label: "Ok!",
                className: "btn-success"
            }
        }
    });
}
function onDanger() {
    bootbox.dialog({
        message: "Las contrasenas no coinciden.",
        title: "MENSAJE ERROR",
        buttons: {
            danger: {
                label: "Error!",
                className: "btn-danger"
            }
        }
    });
}

function onCorreo() {
    bootbox.dialog({
        message: "El correo ya se encuentra registrado. Ingrese otro",
        title: "MENSAJE ERROR",
        buttons: {
            danger: {
                label: "Error!",
                className: "btn-danger"
            }
        }
    });
}

function onProhibido() {
    bootbox.dialog({
        message: "Esta tratando de acceder a un area restringida. Solicite los permisos respectivos al administrador del sistema.",
        title: "MENSAJE ERROR",
        buttons: {
            danger: {
                label: "Error!",
                className: "btn-danger"
            }
        }
    });
}

function cuentaNoActivada() {
    bootbox.dialog({
        message: "El correo se encuentra inactivo",
        title: "MENSAJE ERROR",
        buttons: {
            success: {
                label: "Reenviar Correo de Confirmacion",
                className: "btn-success",
                callback: function() {

                    var em = $('#email_1').val();
                    var parametros = {
                        "email": em
                    }
                    $.ajax({
                        data: parametros,
                        url: 'http://localhost/codeigniter/cliente/reenviarCorreo',
                        type: 'post',
                        beforeSend: function() {


                        },
                        success: function(response) {
                            bootbox.dialog({
                                message: "Correo Reenviado con exito",
                                title: "Correo Reenviado",
                                buttons: {
                                    success: {
                                        label: "OK",
                                        className: "btn-success"
                                    }
                                }
                            });
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert('Ha ocurrido un error al enviar la solicitud')
                        },
                        statusCode: {
                            404: function() {
                                alert("page not found");
                            }
                        }
                    });
                }
            }
        }
    });
}


function onCorreo2() {
    bootbox.dialog({
        message: "El correo no se encuentra registrado. Ingrese otro",
        title: "MENSAJE ERROR",
        buttons: {
            danger: {
                label: "Error!",
                className: "btn-danger"
            }
        }
    });
}

function onCatalogo() {
    bootbox.dialog({
        message: "Debe estar registrado o logeado para realizar compras.",
        title: "MENSAJE DE ADVERTENCIA",
        buttons: {
            danger: {
                label: "Advertencia!",
                className: "btn-warning"
            }
        }
    });
}

function onBienvenido() {
    bootbox.dialog({
        message: "Bienvenido ",
        title: "MENSAJE DE BIENVENIDA ",
        buttons: {
            success: {
                label: "Holaa!",
                className: "btn-success"
            }
        }
    });
}

function onRedirigir() {
    bootbox.dialog({
        message: "Ha intentado ingresar a un pagina restringida. Por favor Identifiquese",
        title: "ERROR DE ACCESO ",
        buttons: {
            danger: {
                label: "identifiquese",
                className: "btn-success"
            }
        }
    });
}

