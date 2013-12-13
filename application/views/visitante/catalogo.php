

<div class="container">
    <div class="text-left">
        <h3><img src="<?= base_url() ?>img/catalogo.png"/><span class="bold"> CAT�LOGO</span></h3>
        <hr>
    </div>
    <div class="search row">
        <div class="col-md-offset-3 col-md-6">
            <?php
            $attribute['class'] = 'navbar-form';
            $attribute['role'] = 'search';
            echo form_open(base_url() . "catalogo/do_search", $attribute);
            ?>

            <div class="input-group">

                <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="bt_cat" >Categoria<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <?php
                        foreach ($categorias as $categoria) {
                            ?>
                        <li><a href="#"><?= $categoria->Nombre?></a></li>
                            <?php
                        }
                        ?>

                        <!--<li><a href="#">Categoria 2</a></li>-->
                    </ul>
                </div><!-- /btn-group -->
                <input type="text" class="form-control" placeholder="Ingrese titulo o autor del libro" name="titulo" id="titulo" value="<?= isset($busqueda) ? $busqueda : '' ?>">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>


    <?php
    $logueado = TRUE;
    if ($this->session->userdata('cliente') == FALSE) {
        $logueado = FALSE;
        ?>
        <?php
    }
    ?>

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
                    <?php
                    if ($l->Imagen != NULL)
                        $s = base_url() . "photo/" . $l->Imagen;
                    else
                        $s = base_url() . "img/place_2.png";
                    ?>
                    <img src="<?= $s ?>" alt="..." class="img-rounded">
                    <div class="caption">
                        <h4><?= $l->Titulo ?></h4>
                        <p><span class="bold">Autor: </span><?= $l->Autor ?></p>
                        <p><span class="bold">Categor�a: </span><?= $l->Nombre ?></p>   
                        <p><span class="bold">Precio: </span>S/. <?= $l->Precio ?></p>        

                        <div class="container">
                            <div class="col-lg-6">
                                <a href="<?= base_url() . 'catalogo/detalles/' . $l->id ?>" class="btn btn-primary text-center">Ver m�s >></a>
                            </div>
                            <div class="col-lg-6">
                                <a href="#" class="btn btn-success text-center" 
                                <?php
                                if (!$logueado) {
                                    echo "onclick ='return onCatalogo();'";
                                } else {
                                    echo "onclick='return agregarCarrito($l->id);'";
                                }
                                ?> >Agregar al <i class="glyphicon glyphicon-shopping-cart"></i></a>
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
