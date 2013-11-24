<div class="contenedor">
    <div class="panel panel-info centrado">
        <div class="panel-heading text-center">
            <h3 class="panel-title"><span class="bold"><?=$titulo?></span></h3>
        </div>
        <div class="panel-body col-6">
            <div class="container col-lg-6 centrado1">
                <p>
                    <label for="nombre">Pedido ID:</label><span class="bold"> <?= $pedido->id?></span>
                </p>
                <p>
                    <label for="apellido">Cliente:</label> <?= ucwords($pedido->Nombre.' '.$pedido->Apellidos)?>
                </p>
                <p>

                    <label for="email">Fecha del Pedido:</label> <?= $pedido->FechaPedido?>       
                </p>
                <p>
                    <?php
                    $estado = $pedido->Estado;
                    switch ($estado) {
                        case 'En proceso':$badge = 'info';
                            break;
                        case 'Suspendido':$badge = '';
                            break;
                        case 'Faltan existencias':$badge = 'important';
                            break;
                        case 'Entregado':$badge = 'success';
                            break;
                        case 'Impagado':$badge = 'falta';
                            break;
                        case 'Cancelado':$badge = 'cancel';
                            break;
                        default:$badge = 'other';
                            break;
                    }
                    ?>
                    <label for="email">Estado:</label>&nbsp;<span class="badge badge-<?=$badge?>"> <?= $pedido->Estado?></span> 
                </p>

            </div>
            <div class="container">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th class="text-center">NOMBRE PRODUCTO</th>
                            <th class="text-center">CANTIDAD</th>
                            <th class="text-center">PRECIO</th>
                            <th class="text-center">SUB TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="text-center">Programacion 1</td>
                            <td class="text-center">2</td>
                            <td class="text-center">
                                <span class="label label-primary">$15.00</span>
                            </td>
                            <td class="text-center">
                                <span class="label label-default">$30.00</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><span class="bold">SUBTOTAL</span></td>
                            <td class="text-center">
                                <span class="label label-success"><strong>$50.00</strong></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><span class="bold">IGV</span></td>
                            <td class="text-center">
                                <span class="label label-warning"><strong>$3.00</strong></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><span class="bold">TOTAL</span></td>
                            <td class="text-center">
                                <span class="label label-danger">$33.00</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>



        </div>

    </div>
</div>
</div>