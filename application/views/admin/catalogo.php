<div class="search row">
      <div class="col-md-5">
          <form class="navbar-form" role="search" action="<?=base_url()?>admin/catalogo/index">
          <div class="input-group">
              
              <input type="text" class="form-control" placeholder="Busca en Catálogo" name="titulo" id="titulo">
              
              <div class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
          </div>
          </form>
      </div>
      <div class="col-md-7">
            <p class="text-right">
                <a href="<?=base_url()?>admin/catalogo/agregar" class="btn btn-success text-center"><i class="glyphicon glyphicon-plus"></i> Agregar</a>
            </p>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-12">

        <!-- Table -->
        <table class="table table-bordered table-hover text-center">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">IMAGEN</th>
              <th class="text-center">TITULO</th>
              <th class="text-center">AUTOR</th>
              <th class="text-center">CATEGORIA</th>
              <th class="text-center">DESCRIPCION</th>
              <th class="text-center">PRECIO</th>
              <th class="text-center">CANTIDAD</th>
              <th class="text-center">ACCION</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($libros as $l) {?>
            <tr>
              <td><?=$l->id?></td>
              <td> 
                <input type="file" name="datafile" size="40" accept="image/jpeg, image/png">
              </td>
              <td><?=$l->Titulo?></td>
              <td><?=$l->Autor?></td>
              <td><?=$l->nombreCategoria?></td>
              <td><?=$l->Detalle?></td>
              <td><?=$l->Precio?></td>
              <td><?=$l->Existencias?></td>
              <td><a href="#" class="btn btn-primary text-center"><span class="glyphicon glyphicon-ok"></span> Guardar</a> 
                  <a href="<?=base_url()?>admin/catalogo/eliminar/<?=$l->id?>" class="btn btn-danger text-center"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>
              </td>
            </tr>
            
              <?php }?>
            
          </tbody>
        </table>
      </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
            <ul class="pagination">
              <li><a href="#">&laquo;</a></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">&raquo;</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>