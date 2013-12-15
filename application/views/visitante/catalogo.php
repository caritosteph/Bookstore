

<div class="container">
    <div class="text-left">
        <h3><img src="<?= base_url() ?>img/catalogo.png"/><span class="bold"> CATÁLOGO</span></h3>
        <hr>
    </div>
    <div class="search row">
        <div class="col-md-offset-2 col-md-7">
            <?php
            $attribute['class'] = 'navbar-form';
            $attribute['role'] = 'search';
            echo form_open(base_url() . "catalogo/do_search", $attribute);
            ?>

            <div class="input-group">

                <div class="input-group-btn" style="padding-bottom: 10px;">
                    <select class="selectpicker">
                        <?php
                        foreach ($categorias as $categoria) {
                            ?>
                            <option><?= $categoria->Nombre?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div> 

                <input type="text" class="form-control" placeholder="Ingrese titulo o autor del libro" name="titulo" id="titulo" value="<?= isset($busqueda) ? $busqueda : '' ?>">
                <div class="input-group-btn" style="padding-bottom: 20px;">
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
                        <p><span class="bold">Categoría: </span><?= $l->Nombre ?></p>   
                        <p><span class="bold">Precio: </span>S/. <?= $l->Precio ?></p>        

                        <div class="container">
                            <div class="col-lg-6">
                                <a href="<?= base_url() . 'catalogo/detalles/' . $l->id ?>" class="btn btn-primary text-center">Ver más >></a>
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
