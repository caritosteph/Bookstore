<div class="container">

    <div class="row formulario">
        <div class="col-sm-offset-4 col-sm-4">

            <h2 class="text-center">INICIAR SESION ADMINISTRADOR</h2>
            <form method="post" action="<?= base_url() ?>admin/home/login">
                <div class="form-group">
                    <label for="email">Correo Electr�nico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electr�nico" required>
                </div>
                <div class="form-group">
                    <label for="clave">Contrase�a</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase�a" required>
                    
                </div>

                <?php if (isset($error)) { ?>
                    <div class="form-group">
                        <?= $error ?>
                    </div>
                <?php } ?>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>