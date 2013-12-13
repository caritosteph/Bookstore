<div class="contenedor">
    <div class="panel panel-info centrado">
        <div class="panel-heading text-center">
            <h3 class="panel-title"><span class="bold"><?=$titulo?></span></h3>
        </div>
        <div class="panel-body col-6">
            <form method="post" action="<?= base_url()?>admin/categoria/modificar/<?=$this->uri->segment(4)?>">

                <div class="container col-lg-6 centrado1">
                    <div class="form-group">
                        <label for="nombre">Nombre de categoria</label>
                        <?php
                        if (isset($categorias)) {
                            $value = $categorias->Nombre;
                        } else {
                            $value = '';
                        }
                        ?>
                        <input type="text" class="form-control" id="nombre" name="nombre"  value="<?=$value?>" placeholder="Ingresar nombre de usuario" pattern="[Ñña-zA-ZáéíóúÁÉÍÓÚ][Ñña-zA-ZáéíóúÁÉÍÓÚ ']{1,50}" maxlength="50"  required>
                        <?php echo form_error('nombre'); ?>
                    </div>
                    <div class="actions text-center">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>&nbsp;<a href="<?= base_url()?>admin/categoria"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</button></a>
                    </div><br>
                </div>
            </form>
        </div>
    </div>
</div>
</div>