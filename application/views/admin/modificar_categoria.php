<div class="contenedor">
    <div class="panel panel-info centrado">
        <div class="panel-heading text-center">
            <h3 class="panel-title"><span class="bold"><?=$titulo?></span></h3>
        </div>
        <div class="panel-body col-6">
                <form method="post" action="#">

                    <div class="container col-lg-6 centrado1">
                        <div class="form-group">
                            <label for="nombre">Nombre de Categoria</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar categoria" required>
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