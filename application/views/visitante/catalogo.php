

<div class="container">
    <div class="search row">
        <div class="col-md-offset-3 col-md-6">
            <?php
            $attribute['class'] = 'navbar-form';
            $attribute['role'] = 'search';
            echo form_open(base_url() . "catalogo/do_search", $attribute);
            ?>

            <div class="input-group">
                <!--                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" >
                                        Categorías
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                <?php /* foreach ($categorias as $c) {
                  ?>
                  <li><a href="#"><?= $c->Nombre ?></a></li>
                  <?php } */ ?>
                                    </ul>
                                </div>-->
                <input type="text" class="form-control" placeholder="Ingrese titulo o autor del libro" name="titulo" id="titulo" value="<?= isset($busqueda) ? $busqueda : '' ?>">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>



    <div class = "row">
        <?php
        $i = 0;
        foreach ($libros as $l) {
            ?>


            <?php if ($i > 0 && $i % 4 == 0) { ?>
            </div>
            <div class="row">
            <?php } ?>

            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="http://placehold.it/263x350" alt="..." class="img-rounded">
                    <div class="caption">
                        <h4><?= $l->Titulo ?></h4>
                        <p><span class="bold">Autor: </span><?= $l->Autor ?></p>
                        <p><span class="bold">Categoría: </span><?= $l->Nombre ?></p>   
                        <p><span class="bold">Precio: </span>S/. <?= $l->Precio ?></p>        
       
                        <div class="container">
                            <div class="col-lg-6">
                                <a href="<?= base_url() . 'catalogo/detalles/' . $l->id ?>" class="btn btn-primary text-center">Ver más >></a>
                            </div>
                            <div class="col-lg-6">
                                <a href="#" class="btn btn-success text-center">Comprar</a>
                            </div>
                        </div>
         

                    </div>
                </div>
            </div>



            <?php
            $i++;
        }
        ?>  
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
</div>
