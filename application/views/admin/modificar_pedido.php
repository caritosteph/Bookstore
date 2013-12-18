<div class="contenedor">
    <div class="panel panel-info centrado">
        <div class="panel-heading text-center">
            <h3 class="panel-title"><span class="bold"><?=$titulo?></span></h3>
        </div>
        <div class="panel-body col-6">
            <form method="post" action="<?= base_url()?>admin/pedido/actualizar/<?= $pedido->id?>">
                <div class="text-center">
                    <label>Pedido ID:</label><span class="bold"><?= $pedido->id?></span>
                </div>
                <div class="row marketing">
                    <div class="col-lg-6">
                        <div>
                            <label>Nombres</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$pedido->Nombre?>" disabled required>
                            <?php echo form_error('nombre'); ?>
                        </div><br>
                        <div>
                            <label>Fecha del Pedido</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
                                <input type="text" class="form-control" name="fecha" value="<?= date('d - m - Y',strtotime($pedido->FechaPedido))?>" disabled="" required>
                                <?php echo form_error('fecha'); ?>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <label>Apellidos</label>
                            <input type="text" class="form-control" name="apellido" value="<?= $pedido->Apellidos?>" disabled required>
                            <?php echo form_error('apellido'); ?>
                        </div><br>
                        <div>
                            <label class="control-label">Fecha de Recojo</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
                                <input type="text" id="datepicker" class="form-control" name="fechar" value="<?= $pedido->FechaRecogo?>" required>
                                <?php echo form_error('fechar'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="container col-lg-6 centrado1">
                        <div class="form-group">
                            <br><label>Estado</label>
                            <select name="estado" class="selectpicker form-control input" >
                                <?php foreach ($estado as $e) { ?>
                                    <option value="<?= $e->id?>" <?php
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
                                <th class="text-center">PRECIO SIN IGV</th>
                                <th class="text-center">SUB TOTAL</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $suma = 0.0;
                            foreach ($libro as $lb) {
                                ?>
                                <tr>

                                    <td class="text-center"><?= $lb->Titulo?></td>
                                    <td class="text-center"><?= $lb->Unidades?></td>
                                    <td class="text-center">
                                        <?php $precio = ($lb->Precio) * 100 / 118; ?>
                                        <span class="label label-primary"><?= round($precio,2)?></span>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        $precioTotal = $precio * ($lb->Unidades);
                                        $suma += $precioTotal;
                                        ?>
                                        <span class="label label-default"><?= round($precioTotal,2)?></span>
                                    </td>
                                    <td>
                                                                              
                                        <a href="<?=base_url()?>admin/pedido/eliminarItemPedido/<?=$lb->id?>/<?= $pedido->id?>"><button type="button" class="btn btn-sm btn-danger" name='eliminar'><span class="glyphicon glyphicon-remove"></span></button></a>
                                    </td>

                                </tr>
                                <?php
                            }
                            $nuevoIGV = $suma * 118 / 100;
                            $nuevoTotal = $suma + $nuevoIGV;
                            $_SESSION['nuevoPrecio'] = $suma;
                            $_SESSION['nuevoIGV'] = $nuevoIGV;
                            ?>

                            <tr>
                                <td colspan="3" class="text-right"><span class="bold">SUBTOTAL</span></td>
                                <td class="text-center">
                                    <span class="label label-success"><strong><?= round($suma,2)?></strong></span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right"><span class="bold">IGV</span></td>
                                <td class="text-center">
                                    <span class="label label-warning"><strong><?= round($nuevoIGV,2) ?></strong></span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right"><span class="bold">TOTAL</span></td>
                                <td class="text-center">
                                    <span class="label label-danger"><?= round($nuevoTotal,2) ?></span>
                                </td>
                                <td></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="actions text-center">
                    <button type="submit" class="btn btn-success" name="guardar"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>&nbsp;
                    <a href="<?= base_url()?>admin/pedido"><button type="button" class="btn btn-danger" name='cancelar'><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</button></a>
                </div><br>
            </form>
        </div>
    </div>
</div>
</div>