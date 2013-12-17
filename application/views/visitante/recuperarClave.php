Ingrese correo para mandarle un enlace para reestablecer su contraseña
<br>
<form action="<?= base_url().'cliente/enviarCorreoClave' ?>" method="post">
    Email <input type="email" name="email" />
    <br>
    <input type="submit" value="Enviar" />
</form>