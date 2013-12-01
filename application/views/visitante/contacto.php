<div class="container">
    <h2 class="text-center">CONTACTO</h2>

        <div class="col-sm-offset-3 col-sm-6">
            <div class="row marketing">
                
                <form method="post" action="#" enctype="multipart/form-data">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu Nombre" required>
                            <?php echo form_error('nombre'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control" name="email" placeholder="Ingresa tu Correo Electrónico" required>
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="form-group">
                            <label for="clave">Comentario</label>
                            <textarea type="text" class="form-control" name="comentario" rows="5"></textarea>
                            <?php echo form_error('comentario'); ?>
                        </div>
                        <div class="actions text-center">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span>Enviar</button>&nbsp;<a href="#"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</button></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        
                    </div>
                </form>
            </div>
        </div>


</div>
</div>
