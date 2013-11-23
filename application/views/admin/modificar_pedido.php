<div class="contenedor">
    <div class="panel panel-info centrado">
        <div class="panel-heading text-center">
            <h3 class="panel-title"><span class="bold"><?=$titulo?></span></h3>
        </div>
        <div class="panel-body col-6">
            <div class="text-center">
                <label for="id" >Pedido ID:</label><span class="bold"> 1</span>
            </div>
            <div class="row marketing">
                <div class="col-lg-6">
                    <div>
                        <label for="nombre">Nombres</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                        <?php echo form_error('nombre'); ?>
                    </div>
                    <div>
                        <label for="email">Fecha del Pedido</label>
                        <div id="datetimepicker" class="input-group">
                            <input  data-format="yyyy-MM-dd" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-calendar"></span></button>
                            </span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div>
                        <label for="apellido">Apellidos</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                        <?php echo form_error('nombre'); ?>
                    </div>

                    <div>
                        <label for="email">Estado</label>
                        <select name="estado" class="form-control input" >
                            <option value="En proceso">En proceso</option>
                            <option value="none">Suspendido</option>
                            <option value="none">Espera existencia</option>
                        </select>
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
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="text-center"><input class="form-control" type="text" name="titulo" value="Programacion 1"></td>
                            <td class="text-center  col-md-1"><input class="form-control text-center" type="text" name="cantidad" value="2"></td>
                            <td class="text-center">
                                <span class="label label-primary">$15.00</span>
                            </td>
                            <td class="text-center">
                                <span class="label label-default">$30.00</span>
                            </td>
                            <td>
                                <a href="#"  class="btn btn-sm btn-danger text-center"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><span class="bold">SUBTOTAL</span></td>
                            <td class="text-center">
                                <span class="label label-success"><strong>$50.00</strong></span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><span class="bold">IGV</span></td>
                            <td class="text-center">
                                <span class="label label-warning"><strong>$3.00</strong></span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><span class="bold">TOTAL</span></td>
                            <td class="text-center">
                                <span class="label label-danger">$33.00</span>
                            </td>
                            <td></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>