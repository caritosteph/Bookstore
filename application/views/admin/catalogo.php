<div class="search row">
    <div class="col-md-5">
        <form class="navbar-form" role="search" action="<?=base_url()?>admin/catalogo/do_buscar" method='post'>
            <div class="input-group">

                <input type="text" class="form-control" placeholder="Busca en Catálogo" name="titulo" id="titulo">

                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <p class="text-right">
            <a href="<?=base_url()?>admin/catalogo/modificar" class="btn btn-success text-center"><i class="glyphicon glyphicon-plus"></i> Agregar</a>
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
                    <th class="text-center">IMAGEN</th>
                    <th class="text-center">TITULO</th>
                    <th class="text-center">AUTOR</th>
                    <th class="text-center">CATEGORIA</th>
                    <th class="text-center">DESCRIPCION</th>
                    <th class="text-center">PRECIO</th>
                    <th class="text-center">CANTIDAD</th>
                    <th class="text-center">ACCION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libros as $l) { ?>
                    <tr>
                        <td><?=$l->id?></td>
                        <td class="text-center"> 
                            <img src="<?=base_url()?>photo/<?=$l->Imagen?>" alt="...">
                        </td>
                        <td class="media-body"><?=$l->Titulo?></td>
                        <td class="media-body"><?=$l->Autor?></td>
                        <td class="media-body"><?=$l->nombreCategoria?></td>
                        <td class="media-body"><?=$l->Detalle?></td>
                        <td class="media-body"><?=$l->Precio?></td>
                        <td class="media-body"><?=$l->Existencias?></td>
                        <td class="media-body"><a href="<?=base_url()?>admin/catalogo/modificar/<?=$l->id?>" class="btn btn-sm btn-primary text-center"><span class="glyphicon glyphicon-pencil"></span></a> 
                            <a href="<?=base_url()?>admin/catalogo/eliminar/<?=$l->id?>" class="btn btn-sm btn-danger text-center"><span class="glyphicon glyphicon-remove"></span></a>
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