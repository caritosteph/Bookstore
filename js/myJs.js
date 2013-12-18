
function validaNumero(e)
{
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum === 8) || (keynum === 46))
        return true;

    return /\d/.test(String.fromCharCode(keynum));
}
function actualiza(e, index, id) {
    if (validaNumero(e)) {
        var cantidad = document.getElementById('precio' + index).value;
        var precio = document.getElementById('precioProd' + index).innerHTML;
        precio = precio.substring(3);
        var precioxLibro = cantidad * parseFloat(precio);

        realizaProceso(id, cantidad);

        document.getElementById('totalProd' + index).innerHTML = 'S/. ' + precioxLibro.toFixed(2);
        precioTotal();
    }

}
function precioTotal() {
    var precios = document.getElementsByName('totalProd');
    var total = 0.0;
    for (var i = 1; i <= precios.length; i++) {
        var valuetd = document.getElementById('totalProd' + i).innerHTML;
        valuetd = valuetd.substr(3);
        total += parseFloat(valuetd);
    }
    document.getElementById('total').innerHTML = 'S/. ' + total.toFixed(2);

}
function realizaProceso(id, cant) {
    var parametros = {
        "id": id,
        "cant": cant
    };
    $.ajax({
        data: parametros,
        url: 'carrito/actualizarElemento',
        type: 'post',
        beforeSend: function() {

        },
        success: function(response) {

        }
    });

}
function agregarCarrito(id, modo) {
    var qty = 1;
    if (modo == 2) {
        qty = $('#qty').val();
    }

    var parametros = {
        "id": id,
        "qty": qty
    };
    $.ajax({
        data: parametros,
        url: 'http://localhost/codeigniter/carrito/agregar',
        type: 'post',
        beforeSend: function() {
            
        },
        success: function() {
            bootbox.dialog({
                message: "Libro agregado al carrito",
                title: "MENSAJE EXITO",
                buttons: {
                    success: {
                        label: "Ok!",
                        className: "btn-success",
                        callback: function() {
                            if (modo === 2) {
                                url = "http://localhost/codeigniter/catalogo";
                                $(location).attr('href', url);
                            }
                        }
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

//1 es paypal
//2 es recoger
function compra() {
    val = $("#tipoPago").prop('checked');
    url = "";
    if (val === true) {
        url = "http://localhost/codeigniter/compra";
        $(location).attr('href', url);
    } else {
        var parameters = {
            "fecha": $('#fechar').val()
        };
        $.ajax({
            data: parameters,
            url: 'carrito/pedido',
            type: 'post',
            beforeSend: function() {

            },
            success: function() {
                bootbox.dialog({
                    message: "Su pedido se ha realizado con exito",
                    title: "MENSAJE EXITO",
                    buttons: {
                        success: {
                            label: "Ok!",
                            className: "btn-success",
                            callback: function() {
                                url = "http://localhost/codeigniter/catalogo";
                                $(location).attr('href', url)
                            }
                        }
                    }
                });
            }
        });

    }

}
