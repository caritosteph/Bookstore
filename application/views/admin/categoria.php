<div class="search row">
    <div class="col-md-5">
        <form class="navbar-form" role="search" action="<?=base_url()?>admin/categoria/do_buscar" method='post'>
            <div class="input-group">

                <input type="text" class="form-control" placeholder="Buscar catagoria" name="buscar" id="buscar" autofocus="">

                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <p class="text-right">
            <a href="<?=base_url()?>admin/categoria/modificar" class="btn btn-success text-center"><i class="glyphicon glyphicon-plus"></i> Agregar</a>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <!-- Table -->
        <table class="table table-bordered table-hover text-center">
            <thead class="row_color">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">NOMBRE DE CATEGORIA</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $c) { ?>

                    <tr>
                        <td class="text-center"><?= $c->id ?></td>
                        <td class="text-center"><?= $c->Nombre ?></td>
                        <td class="media-body"><a href="<?=base_url()?>admin/categoria/modificar/<?= $c->id?>" class="btn btn-sm btn-primary text-center"><span class="glyphicon glyphicon-pencil"></span></a> 
                            <a href="<?=base_url()?>admin/categoria/eliminar/<?=$c->id?>" class="btn btn-sm btn-danger text-center"><span class="glyphicon glyphicon-remove"></span></a>
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
            <?=$pag?>
        </div>
    </div>
</div>
</div>