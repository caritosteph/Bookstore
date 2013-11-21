<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><span class="bold">NUEVO LIBRO</span></h3>
    </div>
    <div class="panel-body">
        <div class="row ">
            <form method="post" action="<?= base_url()?>admin/catalogo/agregar">
                <div class="col-6 col-sm-6 col-lg-4 ">
                    <div class="form-group">
                        <div class="thumbnail" style="width: 263px; height: 350px;"><img src="http://www.placehold.it/263x350/EFEFEF/AAAAAA&text=no+image"></div><br>
                        <a class="file-input-wrapper btn btn-info text-center">Seleccionar imagen<input type="file" title="Seleccionar imagen"></a>
                        <span class="file-input-name"></span>
                    </div>
                </div><!--/span-->
                <div class="col-6 col-sm-6 col-lg-4">
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
                    <div class="form-group col-md-5">
                        <label for="precio">Precio</label>
                        <input type="text" class="form-control" id="descripcion" name="precio" placeholder="Precio" required>
                        <?php echo form_error('precio'); ?>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="cantidad">Cantidad</label>
                        <input type="text" class="form-control" id="descripcion" name="cantidad" placeholder="Cantidad" required>
                        <?php echo form_error('cantidad'); ?>
                    </div>
                    <div class="actions text-center">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>&nbsp;<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</button>
                    </div><br>
                </div>
            </form>
        </div>

    </div>

</div>
</div>
</div>
</div>

