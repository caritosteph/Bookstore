<div class="container">

    <div class="row formulario">
      <div class="col-sm-offset-4 col-sm-4">

        <h2 class="text-center">Nuevo</h2>
        <form method="post" action="<?= base_url()?>cliente/agregar">
            
            <?php foreach ($campos as $campo) {?>
                
                <div class="form-group">
                <label for="<?= $campo['name']?>"><?= $campo['label']?></label>
                <input type="text" class="form-control" id="<?= $campo['name']?>" name="<?= $campo['name']?>" placeholder="<?= $campo['placeholder']?>" required>
                <?php echo form_error('nombre'); ?>
                 </div>
            
            <?php }?>
            
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        
      </div>
    </div>

  </div>