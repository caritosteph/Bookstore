<div class="container">

    <div class="row well">

        <div class="col-md-3 text-center">
            <?php
                                if($libro->Imagen!=NULL)
                                    $s=base_url()."photo/".$libro->Imagen;
                                else
                                    $s=base_url()."img/place_2.png";
            ?>
            <img src="<?=$s?>" alt="...">
        </div>
        <div class="col-md-9">
            <h4><?= $libro->Nombre ?></h4>
            <p><span class="bold">Autor: </span><?= $libro->Autor ?></p>
            <p><span class="bold">Categoría: </span><?= $libro->CategoriaID ?></p> 
            <p><span class="bold">Descripción: </span><?= $libro->Detalle ?></p>  
            <p><span class="bold">Precio: </span>S/. <?= $libro->Precio ?></p> 


            <?php
            $logueado = TRUE;
            if ($this->session->userdata('cliente') == FALSE) {
                $logueado = FALSE;
            }
            ?>


            <?php if ($logueado == TRUE) { ?>
            <form action="<?= base_url() ?>carrito/agregar" class="form-horizontal" role="form" method="post">
                    <div class="col-md-1">

                        <label for="cantidad">Cantidad</label>
                        <input type="text" pattern="[1-9][0-9]*" class="form-control" id="qty" name="qty" onkeypress="return validaNumero(event);" placeholder="1" title='Numero entero mayor que cero'>
                        <input type="hidden" value="<?= $libro->id?>" name='id' />
                        <input type="hidden" value="<?= $libro->Precio ?>" name='price' />
                        <input type="hidden" value="<?= $libro->Nombre ?>" name='name' />
            
                        

                    </div>      
                    <div class="col-md-offset-4 col-md-7">
                        <p>
                            <!--<a href="#" class="btn btn-primary text-center" ><span class="glyphicon glyphicon-shopping-cart"></span> AGREGAR AL CARRITO</a>-->
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar al carrito</button>
                        </p>
                    </div>  
                </form>
            <?php } else { ?>    
                <div class="col-md-1">
                    <form action="#" class="form-horizontal" role="form">
                        <label for="cantidad">Cantidad</label>
                        <input type="text" class="form-control" id="cantidad" placeholder="1" disabled>
                    </form>
                </div>      
                <div class="col-md-offset-4 col-md-7">
                    <p>
                        <button type="submit" class="btn btn-success" disabled=""><span class="glyphicon glyphicon-shopping-cart"></span> Agregar al carrito</button>

                    </p>
                    <p>
                        <a href="<?= base_url() ?>cliente/registro">Regístrate para poder comprar</a>
                    </p>
                </div>  
            <?php } ?>   









        </div>

    </div>

</div>