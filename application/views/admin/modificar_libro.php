<div class="contenedor">
    <div class="panel panel-info centrado">
        <div class="panel-heading text-center">
            <h3 class="panel-title"><span class="bold"><?=$titulo?></span></h3>
        </div>
        <div class="panel-body col-6">
            <div class="row marketing">
                <form method="post" action="<?= base_url()?>admin/catalogo/modificar/<?=$this->uri->segment(4)?>" enctype="multipart/form-data">
                    <div class="col-lg-6">
                        <div class="form-group  text-center">
                            
                            <?php
                                
                                if(isset($libro)&&$libro->Imagen!=NULL){
                                    $s=base_url()."photo/".$libro->Imagen;
                                    echo "<input type='hidden' name='oculto' value='".$libro->Imagen."'>";
                                }
                                
                                elseif(!isset($libro))
                                    $s=base_url()."img/place.png";
                                else
                                    $s=base_url()."img/place_2.png";
                            ?>
                            <div class='thumbnail' style='width: 263px; height: 350px;'><img id="imgSalida" src='<?=$s?>'></div><br>
                            
                            
                            <a class="file-input-wrapper btn btn-info text-center">Seleccionar imagen<input type="file" name="imagen" id="imagen" title="Seleccionar imagen"></a>
                            <span class="file-input-name"></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" id="titulo" <?php
                            if (isset($libro)) {
                                echo "value='$libro->Titulo'";
                            }
                            ?> name="titulo" placeholder="Ingresa el Titulo" pattern="[0-9Ñña-zA-ZáéíóúÁÉÍÓÚ][0-9Ñña-zA-ZáéíóúÁÉÍÓÚ '-.]{1,120}" maxlength="120" autofocus=""  required>
                                   <?php echo form_error('titulo'); ?>
                        </div>
                        <label for="titulo">Categoria</label>

                        <select name="categoria" class="selectpicker form-control input" >
                            <?php foreach ($categorias as $c) { ?>
                                <option value="<?=$c->id?>" <?php
                                if (isset($libro) && $c->id === $libro->CategoriaID) {
                                    echo 'selected';
                                }
                                ?>><?=$c->Nombre?></option>
                                    <?php } ?>                       
                        </select>
                       <div class="form-group">
                            <label for="autor">Autor</label>
                            <input type="text" class="form-control" <?php
                            if (isset($libro)) {
                                echo "value='$libro->Autor'";
                            }
                            ?> id="autor" name="autor" placeholder="Ingresa el Autor" pattern="[Ñña-zA-ZáéíóúÁÉÍÓÚ][Ñña-zA-ZáéíóúÁÉÍÓÚ ']{1,64}" maxlength="64" required>
                                   <?php echo form_error('autor'); ?>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" class="form-control" <?php
                            if (isset($libro)) {
                                echo "value='$libro->Detalle'";
                            }
                            ?> id="descripcion" name="descripcion" placeholder="Ingresa la Descripcion" pattern="[0-9Ñña-zA-ZáéíóúÁÉÍÓÚ][0-9Ñña-zA-ZáéíóúÁÉÍÓÚ '-.,]{1,150}" maxlength="150" required>
                                   <?php echo form_error('descripcion'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" <?php
                            if (isset($libro)) {
                                echo "value='$libro->Precio'";
                            }
                            ?> id="descripcion" name="precio" placeholder="Precio" pattern="[1-9][0-9.]*[0-9]{2}" onkeypress="return validaNumero(event);" required>
                                   <?php echo form_error('precio'); ?>
                        </div>
                        <div class="form-group col-md-6  text-left">
                            <label for="cantidad">Cantidad</label>
                            <input type="text" class="form-control" id="descripcion" <?php
                            if (isset($libro)) {
                                echo "value='$libro->Existencias'";
                            }
                            ?> name="cantidad" placeholder="Cantidad" pattern="[1-9][0-9]*" onkeypress="return validaNumero(event);" required>
                                   <?php echo form_error('cantidad'); ?>
                        </div>
                        <div class="actions text-center">
                            <button type="submit" class="btn btn-success"> Guardar</button>&nbsp;<a href="<?= base_url()?>admin/catalogo"><button type="button" class="btn btn-danger"> Cancelar</button></a>
                        </div><br>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
</div>





