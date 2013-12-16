<div class="container">

    <div class="row formulario">
        <div class="col-sm-offset-4 col-sm-4">

            <h2 class="text-center">INICIAR SESION ADMINISTRADOR</h2>
            <form method="post" action="<?= base_url() ?>admin/home/login">
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" name="email" placeholder="Correo Electrónico"  required>
                </div>
                <div class="form-group">
                    <label for="clave">Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                    
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>