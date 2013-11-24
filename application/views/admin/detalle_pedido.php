<div class="contenedor">
    <div class="panel panel-info centrado">
        <div class="panel-heading text-center">
            <h3 class="panel-title"><span class="bold"><?=$titulo?></span></h3>
        </div>
        <div class="panel-body col-6">

            <div class="row marketing centradito">
                <div class="col-lg-6">
                    <div>
                        <label>PEDIDO ID</label>
                    </div>
                    <div>
                        <label>CLIENTE</label>
                    </div>
                    <div>
                        <label>FECHA DEL PEDIDO</label>    
                    </div>
                    <div>

                        <label>FECHA DE RECOGO</label>    
                    </div>
                    <div>

                        <label>ESTADO</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        <label><span class="bold"> <?= $pedido->id?></span></label>
                    </div>

                    <div>
                        <label><?= strtoupper($pedido->Nombre.' '.$pedido->Apellidos)?></label>
                    </div>
                    <div>
                        <label><?= $pedido->FechaPedido?></label> 
                    </div>
                    <div>
                        <label><?= $pedido->FechaRecogo?></label>  
                    </div>
                    <div>
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
                        <label><span class="badge badge-<?=$badge?>"> <?= $pedido->Estado?></span></label> 
                    </div>
                </div>
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
                        <?php foreach ($libro as $lb) { ?>
                            <tr>
                                <td class="text-center"><?= $lb->Titulo?></td>
                                <td class="text-center"><?= $lb->Unidades?></td>
                                <td class="text-center">
                                    <span class="label label-primary"><?= $lb->Precio?></span>
                                </td>
                                <td class="text-center">
                                    <span class="label label-default"><?= $lb->PrecioTotal?></span>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3" class="text-right"><span class="bold">SUBTOTAL</span></td>
                            <td class="text-center">
                                <span class="label label-success"><strong><?= $pedido->PrecioSinIGV?></strong></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><span class="bold">IGV</span></td>
                            <td class="text-center">
                                <span class="label label-warning"><strong><?= $pedido->IGV?></strong></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><span class="bold">TOTAL</span></td>
                            <td class="text-center">
                                <span class="label label-danger"><?= $pedido->TotalCargo?></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>



        </div>

    </div>
</div>
</div>