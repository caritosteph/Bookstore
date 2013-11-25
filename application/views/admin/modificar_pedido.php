<div class="contenedor">
    <div class="panel panel-info centrado">
        <div class="panel-heading text-center">
            <h3 class="panel-title"><span class="bold"><?=$titulo?></span></h3>
        </div>
        <div class="panel-body col-6">
            <form method="post" action="<?= base_url()?>admin/pedido/actualizar/<?= $pedido->id?>">
                <div class="text-center">
                    <label>Pedido ID:</label><span class="bold">  <?= $pedido->id?></span>
                </div>
                <div class="row marketing">
                    <div class="col-lg-6">
                        <div>
                            <label>Nombres</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$pedido->Nombre?>" disabled required>
                            <?php echo form_error('nombre'); ?>
                        </div>
                        <div>
                            <label>Fecha del Pedido</label>
                            <div id="datetimepicker" class="input-group">
                                <input  data-format="yyyy-MM-dd" type="text" name="fecha" class="form-control" value="<?= $pedido->FechaPedido?>">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-calendar"></span></button>
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div>
                            <label>Apellidos</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $pedido->Apellidos?>" disabled required>
                            <?php echo form_error('apellido'); ?>
                        </div>
                        <div>
                            <label>Fecha de Recogo</label>
                            <div id="datetimepicker" class="input-group">
                                <input  data-format="yyyy-MM-dd" type="text" name ="fechar" class="form-control" value="<?= $pedido->FechaRecogo?>">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-calendar"></span></button>
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="container col-lg-6 centrado1">
                        <div class="form-group">
                            <br><label>Estado</label>
                            <select name="estado" class="form-control input" >
                                <?php foreach ($estado as $e) { ?>
                                    <option value="<?= $e->Estado?>" <?php
                                    if (isset($pedido) && strnatcasecmp($e->Estado, $pedido->Estado) == 0) {
                                        echo 'selected';
                                    }
                                    ?>><?= $e->Estado?></option>
                                        <?php } ?>
                            </select>
                            <?php echo form_error('estado'); ?>
                        </div><br>
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
                                <th class="text-center"></th>
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

                                    <td>
                                        <a href="<?=base_url()?>admin/pedido/eliminarItemPedido/<?=$lb->id?>/<?= $pedido->id?>" class="btn btn-sm btn-danger text-center"><span class="glyphicon glyphicon-remove"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3" class="text-right"><span class="bold">SUBTOTAL</span></td>
                                <td class="text-center">
                                    <span class="label label-success"><strong><?= $pedido->PrecioSinIGV?></strong></span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right"><span class="bold">IGV</span></td>
                                <td class="text-center">
                                    <span class="label label-warning"><strong><?= $pedido->IGV?></strong></span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right"><span class="bold">TOTAL</span></td>
                                <td class="text-center">
                                    <span class="label label-danger"><?= $pedido->TotalCargo?></span>
                                </td>
                                <td></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="actions text-center">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>&nbsp;<a href="<?= base_url()?>admin/pedido"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</button></a>
                </div><br>
            </form>
        </div>
    </div>
</div>
</div>