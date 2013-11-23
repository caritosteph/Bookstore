<div class="search row">
    <div class="col-md-5">
        <form class="navbar-form" role="search" action="<?=base_url()?>admin/pedido/index">
            <div class="input-group">

                <input type="text" class="form-control" placeholder="Buscar pedido" name="pedido" id="pedido">

                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>
    </div>

</div>

<div class="row">
    <div class="col-md-12">

        <!-- Table -->
        <table class="table table-bordered table-hover text-center">
            <thead class="row_color">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">NOMBRES</th>
                    <th class="text-center">APELLIDOS</th>
                    <th class="text-center">FECHA DEL PEDIDO</th>
                    <th class="text-center">CARGO TOTAL</th>
                    <th class="text-center">ESTADO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center">
                            <a href="#" class="active" title="Click para cambiar de estado">
                                <span class="badge badge-info">En proceso</span>
                            </a>
                        </td>
                        <td class="media-body">
                            <a href="<?=base_url()?>admin/pedido/detalle" class="btn btn-sm btn-success text-center"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="#" class="btn btn-sm btn-primary text-center"><span class="glyphicon glyphicon-pencil"></span></a> 
                            <a href="#" class="btn btn-sm btn-danger text-center"><span class="glyphicon glyphicon-remove"></span></a>
                        </td>
                    </tr>
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

