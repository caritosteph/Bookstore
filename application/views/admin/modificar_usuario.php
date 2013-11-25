<div class="contenedor">
    <div class="panel panel-info centrado">
        <div class="panel-heading text-center">
            <h3 class="panel-title"><span class="bold"><?=$titulo?></span></h3>
        </div>
        <div class="panel-body col-6">
            <form method="post" action="<?= base_url()?>admin/usuario/modificar/<?=$this->uri->segment(4)?>">
                <div class="row marketing">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nombre">Nombre de usuario</label>
                            <?php
                            if (isset($usuarios)) {
                                $value = $usuarios->Nombre;
                            } else {
                                $value = '';
                            }
                            ?>
                            <input type="text" class="form-control" id="nombre" name="nombre"  value="<?=$value?>" placeholder="Ingresar nombre de usuario"  required>
                            <?php echo form_error('nombre'); ?>
                        </div>
                        <div class="form-group">
                            <label for="contrasena">Contraseña</label>
                            <?php
                            if (isset($usuarios)) {
                                $value = $usuarios->Contrasena;
                            } else {
                                $value = '';
                            }
                            ?>
                            <input type="password" class="form-control" id="contrasena"  value="<?=$value?>" name="contrasena" placeholder="Contraseña" required>
                            <?php echo form_error('contrasena'); ?>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">Correo Electronico</label>
                            <?php
                            if (isset($usuarios)) {
                                $value = $usuarios->Email;
                            } else {
                                $value = '';
                            }
                            ?>
                            <input type="text" class="form-control" id="email" name="email" value="<?=$value?>" placeholder="Ingresar correo electronico" required>
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="form-group">
                            <label for="confirmar">Confirmar contraseña</label>
                            <?php
                            if (isset($usuarios)) {
                                $value = $usuarios->Contrasena;
                            } else {
                                $value = '';
                            }
                            ?>
                            <input type="password" class="form-control" id="confirmar" name="confirmar" value="<?=$value?>" placeholder="Confirmar contraseña" required>
                            <?php echo form_error('confirmar'); ?>
                        </div>
                        
                    </div>
                    <?php
                        if (isset($error)) {
                            echo "<div class='alert alert-danger text-center'>
                                <strong>$error</strong>
                            </div>";
                        }
                        ?>
                    <div class="actions text-center">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>&nbsp;<a href="<?= base_url()?>admin/usuario"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</button></a>
                    </div><br>
                </div>
            </form>
        </div>
    </div>
</div>
</div>