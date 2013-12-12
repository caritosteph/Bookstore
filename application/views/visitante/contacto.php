<div class="container">
    <div class="text-left">
        <h3><img src="<?= base_url() ?>img/contacto.png"/><span class="bold"> CONTACTO</span></h3>
        <hr>
    </div>
    <div class="col-sm-offset-1 col-md-10">
        <div class="row marketing">
            <form method="post" onsubmit="return onSubmit();" enctype="multipart/form-data">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $nombre ?>" placeholder="Ingresa tu Nombre" required autofocus >
                        <?php echo form_error('nombre'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electr�nico</label>
                        <input type="email" class="form-control" name="email" value="<?= $email?>" placeholder="Ingresa tu Correo Electr�nico" required>
                        <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group">
                        <label for="clave">Comentario</label>
                        <textarea type="text" class="form-control" name="comentario" rows="5"></textarea>
                        <?php echo form_error('comentario'); ?>
                    </div>
                    <div class="actions text-center">
                        <button type="submit" value="Submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span>Enviar</button>&nbsp;
                        <a href="<?= base_url() ?>contacto"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</button></a>
                    </div>

                </div>
            </form>
            <div class="col-sm-offset-2 col-lg-4">
                <label>Directora:</label>
                <p class="text-justified">Mag. Emma Patricia Victorio C�novas</p>
                <label>Jefe de Administraci�n:</label>
                <p class="text-justified">Sra. Norma Alp�n Villarroel</p>
                <label>Telefono principal:</label>
                <p class="text-justified">619-7000</p>
                <ul>
                    <li>DIRECCI�N: Anexo 7531</li>
                    <li>ADMINISTRACI�N: Anexo 7529/7531</li>
                    <li>VENTAS: Anexo 7530/7534</li>
                </ul>

                <label>Direccion:</label>
                <p class="text-justified">Jr. Germ�n Amezaga S/N, Biblioteca Central
                    "Pedro Zulen",Cuarto Piso</p>
                <p class="text-center">Ciudad Universitaria Lima - Per�</p>
            </div>

        </div>
    </div>


</div>
</div>
