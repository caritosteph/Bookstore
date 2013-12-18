<div class="container">

    <div class="row formulario">
        <div class="col-sm-offset-4 col-sm-4">
            <h2 class="text-center">RESTABLECER CONTRASEÑA</h2>
            <br>
            <form action="<?= base_url().'cliente/nuevaClave'?>" method="post">
                <div class="form-group ">
                    <label>Nueva constraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Nueva Contraseña" required>
                </div>
                <div class="form-group ">
                    <label>Confirmar nueva contraseña</label>
                    <input type="password" class="form-control" id="email_1" name="repassword" placeholder="Nueva Contraseña" required>
                </div>
                <input type="hidden" value="<?= $email?>" name="email" />
                <div class="text-center">
                    <button type="submit" class="btn btn-primary ">Cambiar Contraseña</button>
                </div>                

            </form>
        </div>
    </div>
</div>