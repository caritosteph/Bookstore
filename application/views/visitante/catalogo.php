

<div class="container">
    <div class="search row">
        <div class="col-md-offset-3 col-md-6">
            <form action="<?= base_url() ?>catalogo/buscar" class="navbar-form" role="search" method="post">
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" >
                            Categorías
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                            foreach ($categorias as $c) {
                                ?>
                                <li><a href="#"><?= $c->Nombre ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <input type="text" class="form-control" placeholder="Título" name="titulo" id="titulo">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div class="row">
        <?php
        foreach ($libros as $l) {
            ?>

            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="http://placehold.it/263x350" alt="..." class="img-rounded">
                    <div class="caption">
                        <h4><?= $l->Titulo ?></h4>
                        <p><span class="bold">Autor: </span><?= $l->Autor ?></p>
                        <p><span class="bold">Categoría: </span><?= $l->Nombre ?></p>   
                        <p><span class="bold">Precio: </span>S/. <?= $l->Precio ?></p>        
                        <p><a href="<?= base_url() . 'catalogo/detalles/' . $l->id ?>" class="btn btn-primary text-center">Ver más >></a></p>
                    </div>
                </div>
            </div>



            <?php
        }
        ?>  
    </div> 

</div>
