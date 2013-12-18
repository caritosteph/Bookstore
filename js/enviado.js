$(function() {
    $( "#datepicker" ).datepicker();
  });
$(function() {
    
 //Array para dar formato en español
  $.datepicker.regional['es'] = 
  {
  closeText: 'Cerrar', 
  prevText: 'Previo', 
  nextText: 'Próximo',
  
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
  'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
  'Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
  dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd-mm-yy', firstDay: 0, 
  initStatus: 'Selecciona la fecha', isRTL: false};
 $.datepicker.setDefaults($.datepicker.regional['es']);
 
 //miDate: fecha de comienzo D=días | M=mes | Y=año
 //maxDate: fecha tope D=días | M=mes | Y=año
    $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
  });
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

function eliminar() {
    bootbox.dialog({
        message: "¿Seguro de continuar?",
        title: "Custom title",
        buttons: {
            success: {
                label: "Si",
                className: "btn-success",
                callback: function() {
                    Example.show("Se elimino con exito");
                }
            },
            danger: {
                label: "No",
                className: "btn-danger",
                callback: function() {
                    Example.show("No se elimino");
                }
            }
        }
    });
}
