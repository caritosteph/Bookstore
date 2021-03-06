
$(document).ready(function() {
				
        $('.confirmar').click(function(e) {

                e.preventDefault();
                thisHref	= $(this).attr('href');

                bootbox.dialog({
                    message: "�Seguro que desea continuar?",
                    title: "Confirmaci�n",
                    buttons: {
                        success: {
                            label: "Si",
                            className: "btn-success",
                            callback: function() {
                                window.location = thisHref;
                            }
                        },
                        danger: {
                            label: "No",
                            className: "btn-danger",
                        }
                    }
                });

        });

});


$(function() {
    $( "#datepicker" ).datepicker();
  });
$(function() {
    
 //Array para dar formato en espa�ol
  $.datepicker.regional['es'] = 
  {
  closeText: 'Cerrar', 
  prevText: 'Previo', 
  nextText: 'Pr�ximo',
  
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
  'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
  'Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro a�o',
  dayNames: ['Domingo','Lunes','Martes','Mi�rcoles','Jueves','Viernes','S�bado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','S�b'],
  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd-mm-yy', firstDay: 0, 
  initStatus: 'Selecciona la fecha', isRTL: false};
 $.datepicker.setDefaults($.datepicker.regional['es']);
 
 //miDate: fecha de comienzo D=d�as | M=mes | Y=a�o
 //maxDate: fecha tope D=d�as | M=mes | Y=a�o
    $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
  });
function onSubmit() {
    bootbox.dialog({
        message: "Su mensaje fue enviado correctamente",
        title: "MENSAJE ENVIADO",
        buttons: {
            success: {
                label: "Ok",
                className: "btn-success",
                callback: function() {
                    $.ajax({
                        url: 'http://localhost/codeigniter/contacto',
                        beforeSend: function() {


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
        message: "Bienvenido al Panel de Control",
        title: "MENSAJE DE BIENVENIDA ",
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

function onRestablecer() {
    bootbox.dialog({
        message: "Se le ha enviado un correo con un enlace para reestablecer su contrase�a, revise su bandeja.",
        title: "MENSAJE DE CONFIRMACI�N",
        buttons: {
            danger: {
                label: "Listo!",
                className: "btn-success",
            }
        }
    });
}

function onMensaje() {
     bootbox.dialog({
        message: "Revisa la bandeja de tu correo electronico, y confirma tu registro.",
        title: "MENSAJE DE CONFIRMACI�N",
        buttons: {
            success: {
                label: "Ok",
                className: "btn-success",
           }
    }});
}

function onContrasenaRestablecida() {
     bootbox.dialog({
        message: "Su contrase�a se ha reestablecido con exito, ahora puede iniciar session.",
        title: "MENSAJE DE CONFIRMACI�N",
        buttons: {
            success: {
                label: "Listo",
                className: "btn-success",
           }
    }});
}

function onClave() {
     bootbox.dialog({
        message: "La clave ya no es valida.",
        title: "MENSAJE DE ADVERTENCIA",
        buttons: {
            success: {
                label: "Advertencia",
                className: "btn-warning",
           }
    }});
}

function onAdvertencia() {
     bootbox.dialog({
        message: "El correo ingresado no existe, sirvase a registrarse.",
        title: "MENSAJE DE ADVERTENCIA",
        buttons: {
            success: {
                label: "Advertencia",
                className: "btn-warning",
           }
    }});
}
function onCorreoValido() {
     bootbox.dialog({
        message: "Ingrese un correo valido.",
        title: "MENSAJE DE ADVERTENCIA",
        buttons: {
            success: {
                label: "Advertencia",
                className: "btn-warning",
           }
    }});
}
