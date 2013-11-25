
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-left">
                <img src="<?= base_url() ?>img/carrito.jpg"/>
                <span class="bold">CARRITO DE COMPRAS</span>
                <hr>
            </div>
        </div>
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
                                        <input type="text" class="form-control text-center" id="precio<?= $i ?>" value="<?= $item->cantidadLibros ?>" onkeypress="return validaNumero(event);" onkeyup="actualiza(event,<?= $i ?>, '<?= $item->itemcestaID ?>');">
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
                            <td></td>
                            <td class="final text-center bold ">Precio Total:</td>
                            <td class="final text-center bold " id="total"><?= 'S/. ' . number_format($total, 2) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <p><a href="<?= base_url() ?>catalogo" class="btn btn-primary text-center ">SEGUIR COMPRANDO</a></p>
        </div>

        <?php if ($i > 1) { ?>
            <div class="col-md-4 text-center">
                <p><a href="<?= base_url() ?>carrito/borrarTodo" class="btn btn-danger text-center ">BORRAR TODO</a></p>
            </div>
            <div class="col-md-4 text-right">
                <p><a href="#" class="btn btn-success text-center"><span class="glyphicon glyphicon-shopping-cart"></span> COMPRAR TODO</a></p>
            </div>
        <?php } ?>
        <!--      <div class="row">
                <div class="col-md-12">
                  <div class="text-center">
                    <ul class="pagination">
                      <li><a href="#">&laquo;</a></li>
                      <li class="active"><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">&raquo;</a></li>
                    </ul>
                  </div>
                </div>
              </div>-->
    </div>    

</div>