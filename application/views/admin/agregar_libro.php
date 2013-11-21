<div class="container">

    <div class="row formulario">
        <div class="span 6">

            <h2 class="text-left">Nuevo libro</h2>
            <form method="post" action="<?= base_url()?>admin/catalogo/agregar">

                <div class="form-group">
                    <label for="titulo">Imagen</label>
                    <div class="thumbnail" style="width: 150px; height: 150px;"><img src="http://www.placehold.it/150x150/EFEFEF/AAAAAA&text=no+image"></div><br>
                    <a class="file-input-wrapper boton ">Seleccionar imagen<input type="file" title="Seleccionar imagen"></a>
                    <span class="file-input-name"></span>
                </div>
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresa el Titulo" required>
                    <?php echo form_error('titulo'); ?>
                </div>
                <label for="titulo">Categoria</label>
                <select class="form-control">
                    <option value="none">Seleccione una categoría</option>
                    <option value="categoria1">Categoría 1</option>
                    <option value="categoria2">Categoría 2</option>
                    <option value="categoria3">Categoría 3</option>                        
                </select>

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
                <div class="form-group">
                    <label for="descripcion">Precio</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingresa la Descripcion" required>
                    <?php echo form_error('descripcion'); ?>
                </div>
                <div class="form-group">
                    <label for="descripcion">Cantidad</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingresa la Descripcion" required>
                    <?php echo form_error('descripcion'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>

        </div>
    </div>

</div>