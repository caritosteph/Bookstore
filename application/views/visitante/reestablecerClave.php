Formulario para reestablecer contraseña
<form action="<?= base_url().'cliente/nuevaClave' ?>" method="post">
    Escribe tu constraseña : <input type="password" name="password" /><br>
    Vuelve a introducir tu contraseña : <input type="password" name="repassword" />
    <input type="hidden" value="<?= $email?>" name="email" />
    <br><input type="submit" value="Cambiar Contraseña" />
</form>