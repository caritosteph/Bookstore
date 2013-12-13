<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <div class="list-group">
                <a href="#" class="list-group-item active">Mi información</a>
                <a href="#" class="list-group-item">Cambiar contraseña</a>
                <a href="#" class="list-group-item">Mis pedidos</a>
            </div>
        </div><!--/span-->
        <div class="col-lg-offset-2 col-xs-8 col-sm-5">
            <div class="row">
                <form method="post" action="<?= base_url()?>perfil/modificar">
                <div class="form-group">
                    <label for="nombre">Nombres</label>
                    <input type="text" value= "<?=$usuario->Nombre?>" class="form-control" id="nombre" name="nombre" placeholder="Ingresar nombre"  required>
                    <?php echo form_error('nombre'); ?>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electronico</label>
                    <input type="text" value='<?=$usuario->EMail?>'class="form-control" id="autor" name="email" placeholder="Ingresar correo electronico"  required>
                    <?php echo form_error('email'); ?>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellidos</label>
                    <input type="text" value='<?=$usuario->Apellidos?>' class="form-control" id="apellido" name="apellido" placeholder="Ingresar su apellido" required>
                    <?php echo form_error('nombre'); ?>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" value='<?=$usuario->Direccion?>'class="form-control" id="direccion" name="direccion" placeholder="Ingrese su dirección" required>
                    <?php echo form_error('direccion'); ?>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" value='<?=$usuario->Telefono?>' class="form-control" id="telefono" name="telefono" placeholder="Ingrese su teléfono" required>
                    <?php echo form_error('telefono'); ?>
                </div>
                <div class="actions text-center">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>&nbsp;<a href="#"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</button></a>
                </div>
            </div>
        </div>
    </div><!--/span-->
</div><!--/row-->
