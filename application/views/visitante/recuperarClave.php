Ingrese correo para mandarle un enlace para reestablecer su contrase�a
<br>
<form action="<?= base_url().'cliente/enviarCorreoClave' ?>" method="post">
    Email <input type="email" name="email" />
    <br>
    <input type="submit" value="Enviar" />
</form>