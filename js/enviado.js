function onSubmit() {
    bootbox.dialog({
        message: "Su mensaje fue enviado correctamente",
        title: "MENSAJE ENVIADO",
        buttons: {
            success: {
                label: "Ok!",
                className: "btn-success",
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
                className: "btn-danger",
            }
        }
    });
}
function onCorreo() {
    bootbox.dialog({
        message: "Las contrasenas no coinciden.",
        title: "MENSAJE ERROR",
        buttons: {
            danger: {
                label: "Error!",
                className: "btn-danger",
            }
        }
    });
}
function onCatalogo() {
    setTimeout(function(){ bootbox.dialog({
        message: "Debe estar registrado o logeado para realizar compras .",
        title: "MENSAJE DE ADVERTENCIA",
        buttons: {
            danger: {
                label: "Advertencia!",
                className: "btn-warning",
            }
        }},30000000);
   
    });
}

