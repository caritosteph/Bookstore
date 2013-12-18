<div class="container">

    <div class="row formulario">
        <div class="col-sm-offset-4 col-sm-4">
            <h2 class="text-center">RESTABLECER CONTRASEÑA</h2>
            <br>
            <form action="<?= base_url().'cliente/enviarCorreoClave' ?>" method="post">
                <div class="form-group ">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email_1" name="email" value="<?= set_value('email'); ?>" placeholder="Correo Electrónico" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary ">Enviar</button>
                </div>                

            </form>
        </div>
    </div>
</div>