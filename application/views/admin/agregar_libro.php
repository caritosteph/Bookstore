<div class="container">

    <div class="row formulario">
      <div class="col-sm-offset-4 col-sm-4">

        <h2 class="text-center">Nuevo libro</h2>
        <form method="post" action="<?= base_url()?>admin/catalogo/agregar">
          <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresa el Titulo" required>
            <?php echo form_error('titulo'); ?>
          </div>

          <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" placeholder="Ingresa el Autor" required>
            <?php echo form_error('autor'); ?>
          </div>

          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingresa la Descripcion" required>
            <?php echo form_error('descripcion'); ?>
          </div>

          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        
      </div>
    </div>

  </div>