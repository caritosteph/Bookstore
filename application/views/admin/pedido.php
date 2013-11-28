<div class="search row">
    <div class="col-md-5">
        <form class="navbar-form" role="search" action="<?=base_url()?>admin/pedido/do_buscar" method='post'>
            <div class="input-group">

                <input type="text" class="form-control" placeholder="Buscar pedido" name="buscar" id="pedido" autofocus=""> 

                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>
    </div>

</div>

<div class="row">
    <div class="col-md-12">

        <!-- Table -->
        <table class="table table-bordered table-hover text-center">
            <thead class="row_color">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">NOMBRES</th>
                    <th class="text-center">APELLIDOS</th>
                    <th class="text-center">FECHA DEL PEDIDO</th>
                    <th class="text-center">FECHA DE RECOGO</th>
                    <th class="text-center">CARGO TOTAL</th>
                    <th class="text-center">ESTADO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $p) { ?>


                    <tr>
                        <td class="text-center"><?= $p->id?></td>
                        <td class="text-center"><?= $p->Nombre?></td>
                        <td class="text-center"><?= $p->Apellidos?></td>
                        <td class="text-center"><?= $p->FechaPedido?></td>
                        <td class="text-center"><?= $p->FechaRecogo?></td>
                        <td class="text-center"><?= $p->TotalCargo?></td>
                        <td class="text-center">
                            <?php
                            $estado = $p->Estado;
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
                            <span class="badge badge-<?=$badge?>"><?= $p->Estado?></span>
                        </td>
                        <td class="media-body">
                            <a href="<?=base_url()?>admin/pedido/detalle/<?=$p->id?>" class="btn btn-sm btn-success text-center"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="<?=base_url()?>admin/pedido/modificar/<?=$p->id?>" class="btn btn-sm btn-primary text-center"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href = "<?=base_url()?>admin/pedido/eliminar/<?=$p->id?>" class = "btn btn-sm btn-danger text-center"><span class = "glyphicon glyphicon-remove"></span></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="text-center">

            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
</div>

