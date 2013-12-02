
<div class="container">
    <h1>Completar el pago </h1>
    <hr>
    <h3>Texto cualquiera ...</h3>
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="formp">
        <input name="cmd" type="hidden" value="_cart">
        <input name="upload" type="hidden" value="1">
        <input name="business" type="hidden" value="Vende@pruebaP.com">
        <input name="shopping_url" type="hidden" value="<?= base_url() ?>">
        <input name="currency_code" type="hidden" value="USD">
        <input name="return" type="hidden" value="<?= base_url() ?>compra/exito">
        <input type='hidden' name='cancel_return' value='<?= base_url() ?>compra/error'>
        <input name="notify_url" type="hidden" value="<?= base_url() ?>compra/paypal">
        <input name="rm" type="hidden" value="2">

        <?php
        $contador = 1;
        foreach ($items as $item) {
            ?>
            <input name="item_number_<?php echo $contador; ?>" type="hidden" value="<?= $item->libroID ?>">
            <input name="item_name_<?php echo $contador; ?>" type="hidden" value="<?= $item->titulo; ?>">
            <input name="amount_<?php echo $contador; ?>" type="hidden" value="<?= $item->precioLibro; ?>">
            <input name="quantity_<?php echo $contador; ?>" type="hidden" value="<?= $item->cantidadLibros; ?>">

            <?php
            $contador++;
        }
        ?>
        <input type="submit" value="PayPal SandBox">

        <script>
            document.formp.submit();
        </script>
    </form>
</div>