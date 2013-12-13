<div class="container">

    <div class="row formulario">
        <div class="col-sm-offset-4 col-sm-4">

            <h2 class="text-center">REGISTRO</h2>
            <form method="post" action="<?= base_url()?>cliente/registrar">
                <label for="nombre">Nombres</label>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= set_value('nombre'); ?>" placeholder="Ingresa tu Nombre" pattern="[Ñña-zA-Z][Ñña-zA-Z ']{1,64}" maxlength="64" required>
                    <?php echo form_error('nombre'); ?>
                </div>
                <label for="apellido">Apellidos</label>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?= set_value('apellido'); ?>" placeholder="Ingresar su apellido" pattern="[Ñña-zA-Z][Ñña-zA-Z ']{1,64}" maxlength="64" required>
                    <?php echo form_error('apellido'); ?>
                </div>
                <label for="email">Correo Electrónico</label>
                <div class="form-group input-group">

                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span> 
                    <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>" placeholder="Ingresa tu Correo Electrónico" required>
                    <?php echo form_error('email'); ?>
                </div>
                <label for="direccion">Dirección</label>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span> 
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?= set_value('direccion'); ?>" placeholder="Ingrese su dirección" pattern="[0-9Ñña-zA-Z][0-9Ñña-zA-Z '-.]{1,64}" maxlength="64" required>
                    <?php echo form_error('direccion'); ?>
                </div>

                <label for="telefono">Teléfono</label>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span> 
                    <input type="tel" class="form-control" id="telefono" name="telefono" value="<?= set_value('telefono'); ?>" placeholder="Ingrese su teléfono" onkeypress="return validaNumero(event);" pattern="[1-9]\d{8}|[1-9]\d{2}[-]?\d{4}" required>
                    <?php echo form_error('telefono'); ?>
                </div>
                <label for="clave">Contraseña</label>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> 
                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña" pattern=".{6,}" title="6 caracteres como minimo" required>
                    <?php echo form_error('clave'); ?>

                </div>
                <label for="clave">Confirmar Contraseña</label>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> 
                    <input type="password" class="form-control" id="confirma_clave" name="confirma_clave" placeholder="Confirmar Contraseña" pattern=".{6,}" title="6 caracteres como minimo" required ><br>
                    <?php echo form_error('confirma_clave'); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="col-lg-offset-4 btn btn-primary">Crear cuenta</button>

                </div>
            </form>

        </div>
    </div>

</div>
