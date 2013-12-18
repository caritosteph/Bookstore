<div class="container">

    <div class="row formulario" id="restablecer">
        <div class="col-sm-offset-4 col-sm-4">
            <h2 class="text-center">RESTABLECER CONTRASEŅA</h2>
            <br>
            <form action="<?= base_url().'cliente/nuevaClave'?>" method="post">
                <div class="form-group ">
                    <label>Nueva constraseņa</label>
                    <input type="password" class="form-control" name="password" placeholder="Nueva Contraseņa" pattern=".{6,}" title="6 caracteres como minimo" required autofocus="">
                </div>
                <div class="form-group ">
                    <label>Confirmar nueva contraseņa</label>
                    <input type="password" class="form-control" id="email_1" name="repassword" placeholder="Nueva Contraseņa" pattern=".{6,}" title="6 caracteres como minimo" required>
                </div>
                <input type="hidden" value="<?= $email?>" name="email" />
                <div class="text-center">
                    <button type="submit" class="btn btn-primary ">Cambiar</button>
                    <a href="<?= base_url()?>home"><button type="button" class="btn btn-danger">Cancelar</button></a>
                </div>                

            </form>
        </div>
    </div>
</div>