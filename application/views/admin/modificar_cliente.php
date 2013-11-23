<div class="contenedor">
    <div class="panel panel-info centrado">
        <div class="panel-heading text-center">
            <h3 class="panel-title"><span class="bold"><?=$titulo?></span></h3>
        </div>
        <div class="panel-body col-6">
            <form method="post" action="<?= base_url()?>admin/cliente/modificar/<?=$this->uri->segment(4)?>">
                <div class="row marketing">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nombre">Nombres</label>
                            <input type="text" <?php if (isset($cliente)) echo "value='" . $cliente->Nombre . "'"; ?> class="form-control" id="nombre" name="nombre" placeholder="Ingresar nombre" required>
                            <?php echo form_error('nombre'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electronico</label>
                            <input type="text" <?php if (isset($cliente)) echo "value='" . $cliente->EMail . "'"; ?> class="form-control" id="autor" name="email" placeholder="Ingresar correo electronico" required>
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="form-group">
                            <label for="contrasena">Contraseña</label>
                            <input type="password" <?php if (isset($cliente)) echo "value='" . $cliente->Contrasena . "'"; ?> class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                            <?php echo form_error('contrasena'); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="apellido">Apellidos</label>
                            <input type="text" <?php if (isset($cliente)) echo "value='" . $cliente->Apellidos . "'"; ?> class="form-control" id="apellido" name="apellido" placeholder="Ingresar su apellido" required>
                            <?php echo form_error('nombre'); ?>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" <?php if (isset($cliente)) echo "value='" . $cliente->Direccion . "'"; ?>class="form-control" id="direccion" name="direccion" placeholder="Ingrese su dirección" required>
                            <?php echo form_error('direccion'); ?>
                        </div>
                        <div class="form-group">
                            <label for="confirmar">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="confirmar" name="confirmar" placeholder="Confirmar contraseña" required>
                            <?php echo form_error('confirmar'); ?>
                        </div>
                    </div>
                    <div class="container col-lg-6 centrado1">
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" <?php if (isset($cliente)) echo "value='" . $cliente->Telefono . "'"; ?> class="form-control" id="telefono" name="telefono" placeholder="Ingrese su teléfono" required>
                            <?php echo form_error('telefono'); ?>
                        </div><br>
                    </div>
                </div>
                <div class="actions text-center">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>&nbsp;<a href="<?= base_url()?>admin/cliente"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</button></a>
                </div><br>
            </form>
        </div>
    </div>
</div>
</div>
