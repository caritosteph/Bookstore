Formulario para reestablecer contrase�a
<form action="<?= base_url().'cliente/nuevaClave' ?>" method="post">
    Escribe tu constrase�a : <input type="password" name="password" /><br>
    Vuelve a introducir tu contrase�a : <input type="password" name="repassword" />
    <input type="hidden" value="<?= $email?>" name="email" />
    <br><input type="submit" value="Cambiar Contrase�a" />
</form>