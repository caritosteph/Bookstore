
<div class="container">
    <div class="text-left">
        <h3><img src="<?= base_url() ?>img/paypal-i.png"/><span class="bold"> REALIZAR COMPRA</span></h3>
        <hr>
    </div>
    <h5><span class="text-center">Gracias por su compra.... Espere unos segundos se le redireccionara a Paypal</span></h5>
     <div class="text-left">
       <img src="<?= base_url() ?>img/paypal.jpg"/>
    </div>
    
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
        <input type="submit" hidden="" value="PayPal SandBox">

        <script>
            document.formp.submit();
        </script>
    </form>
</div>
