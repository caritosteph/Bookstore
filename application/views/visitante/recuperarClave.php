<div class="container">

    <div class="row formulario" id="recuperar">
        <div class="col-sm-offset-4 col-sm-4">
            <h2 class="text-center">RECUPERAR CONTRASEÑA</h2>
            <br>
            <form action="<?= base_url().'cliente/enviarCorreoClave' ?>" method="post">
                <div class="form-group ">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" name="email" placeholder="Correo Electrónico" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary ">Enviar</button>
                </div>                

            </form>
        </div>
    </div>
</div>
