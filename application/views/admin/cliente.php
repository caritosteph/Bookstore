<div class="search row">
    <div class="col-md-5">
        <form class="navbar-form" role="search" action="<?=base_url()?>admin/cliente/index">
            <div class="input-group">

                <input type="text" class="form-control" placeholder="Buscar cliente" name="cliente" id="cliente">

                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <p class="text-right">
            <a href="#" class="btn btn-success text-center"><i class="glyphicon glyphicon-plus"></i> Agregar</a>
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
                    <th class="text-center">NOMBRES Y APELLIDOS</th>
                    <th class="text-center">EMAIL</th>
                    
                    <th></th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach ($clientes as $c) {?>
                    <tr>
                        <td><?=$c->id?></td>
                        <td class="text-center"><?=$c->Nombre." ".$c->Apellidos?></td>
                        <td class="text-center"><?=$c->EMail?></td>
                        
                        
                        <td class="media-body"><a href="#" class="btn btn-sm btn-primary text-center"><span class="glyphicon glyphicon-pencil"></span></a> 
                            <a href="<?=base_url()?>admin/cliente/eliminar/<?=$c->id?>"  class="btn btn-sm btn-danger text-center"><span class="glyphicon glyphicon-remove"></span></a>
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
                
                <?php for ($index = 0; $index < $total; $index++){?>
                <li <?php if($clientes[0]->id==$index){echo 'class="active"';}?>><a href="<?=base_url()?>admin/cliente/<?=$index?>"><?=($index+1)?></a></li>
                <?php }?>
                
            </ul>
        </div>
    </div>
</div>
</div>
