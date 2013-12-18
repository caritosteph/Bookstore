<div class="container">

    <div class="row formulario" id="iniciar">
        <div class="col-sm-offset-4 col-sm-4">

            <h2 class="text-center">INICIAR SESION</h2>
            <form method="post" action="<?= base_url() ?>cliente/login">
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email_1" name="email" value="<?= set_value('email'); ?>" placeholder="Correo Electrónico" autofocus="" required>
                </div>
                <div class="form-group">
                    <label for="clave">Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" pattern=".{6,}" title="6 caracteres como minimo" required>
                    <label>
                        <input type="checkbox" name="recordar"> Recordarme
                        <a href="<?= base_url().'cliente/recuperar'?> " class="olvido" style="padding-left: 69px;">¿Olvidó su contraseña?</a>
                    </label>
                    
                </div>

                <?php if (isset($error)) { ?>
                    <div class="form-group">
                        <?= $error ?>
                    </div>
                <?php } ?>

                <button type="submit" class="btn btn-primary">Acceder</button><br>
                
            </form>
        </div>
    </div>
</div>