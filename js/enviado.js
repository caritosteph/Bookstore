$(document).ready(function() {
    $(document).on("click", ".enviado", function() {
        var exito = "<?php if(isset($_POST[submit]))?>";
        if (exito) {
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

    });
});