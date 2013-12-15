
<div class="container">
    <div class="text-left">
        <h3><img src="<?= base_url() ?>img/carrito.jpg"/><span class="bold"> CARRITO DE COMPRAS</span></h3>
        <hr>
    </div>

    <div class="row ">
        <div class="col-md-12">

            <!-- Table -->
            <table class="table table-bordered table-condensed table-hover" >
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">DESCRIPCION</th>
                        <th class="text-center">PRECIO</th>
                        <th class="text-center">CANTIDAD</th>
                        <th class="text-center">TOTAL</th>
                        <th class="text-center">ACCION</th>
                    </tr>
                </thead>
                <tbody>

                    <!--Fila-->  

                    <?php
                    $i = 1;
                    $total = 0.0;
                    ?>

                    <?php foreach ($items as $item): ?>
                        <?php echo form_hidden('itemcestaID', $item->itemcestaID); ?>
                        <?php $total+=$item->precioLibro * $item->cantidadLibros; ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>
                                <p><span class="bold">Titulo:</span> <?= $item->titulo ?></p>
                                <p><span class="bold">Autor:</span> <?= $item->autor ?></p>
                            </td>
                            <td class="text-center"><span class="span12" id="precioProd<?= $i ?>">S/. <?= $item->precioLibro ?></span></td>
                            <td>
                                <div class="col-md-5 ">
                                    <form action="#" class="form-horizontal " role="form">
                                        <input type="text" class="form-control text-center" id="precio<?= $i ?>" value="<?= $item->cantidadLibros ?>" onkeypress="return validaNumero(event);" onkeyup="actualiza(event, <?= $i?> , '<?= $item->itemcestaID ?>');">
                                    </form>
                                </div>   
                            </td>
                            <td class="text-center" id="totalProd<?= $i ?>" name="totalProd"><?= 'S/. ' . number_format($item->precioLibro * $item->cantidadLibros, 2) ?></td>
                            <td class="text-center">
                                <a href="<?= base_url() . 'carrito/borrarElemento/' . $item->itemcestaID ?>" class="btn btn-danger text-center"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    <!--Fin FIla-->

                    <?php if ($total > 0) { ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="final text-center bold ">Precio Total:</td>
                            <td class="final text-center bold " id="total"><?= 'S/. ' . number_format($total, 2) ?></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>



    <?php if ($i > 1) { ?>
        <div class="row">
            <div class="col-lg-offset-7 col-md-3">
                <div class="col-md-7">
                    <label class="control-label">Fecha de Recogo</label>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
                        <input type="date" class="form-control" name="fechar" id="fechar" value="" required>
                        <?php echo form_error('fechar'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" name="pago" value="1" id="tipoPago" checked>
                    </span>
                    <input type="text" class="form-control" value="Paypal" readonly >
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" name="pago" value="2">
                    </span>
                    <input type="text" class="form-control" value="Al contado" readonly="">
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-4">
            <p><a href="<?= base_url() ?>catalogo" class="btn btn-primary text-center "><span class="glyphicon glyphicon-circle-arrow-left"></span> SEGUIR COMPRANDO</a></p>
        </div>

        <?php if ($i > 1) { ?>
            <div class="col-md-4 text-center">
                <p><a href="<?= base_url() ?>carrito/borrarTodo" class="btn btn-danger text-center "><span class="glyphicon glyphicon-trash"></span> BORRAR TODO</a></p>
            </div>
            <div class="col-md-4 text-right">
                <p><a href="#" class="btn btn-success text-center" onclick="compra()"><span class="glyphicon glyphicon-shopping-cart"></span> COMPRAR TODO</a></p>
            </div>
        <?php } ?>
    </div>    

</div>