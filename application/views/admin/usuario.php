<div class="search row">
    <div class="col-md-5">
        <form class="navbar-form" role="search">
            <div class="input-group">

                <input type="text" class="form-control" placeholder="Buscar Usuario" name="usuario" id="usuario">

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
        <table class="table table-bordered">
            <thead>
                <tr >
                    <th class='text-center'>ID</th>
                    <th class='text-center'>NOMBRE DE USUARIO</th>
                    <th class='text-center'>CONTRASE�A</th>
                    <th class='text-center'>ACCION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    echo form_open(base_url() . 'admin/usuario/insertar/');

                    $usuario = array(
                        'class' => 'form-control',
                        'name' => 'usuario',
                        'id' => 'usuario',
                    );

                    $contrasena = array(
                        'class' => 'form-control',
                        'name' => 'contrasena',
                        'id' => 'contrasena',
                    );
                    $submit = array(
                        'name' => 'submit',
                        'id' => 'submit',
                        'value' => 'Agregar',
                        'title' => 'Agregar',
                        'class' => 'btn btn-success text-center'
                    );
                    ?>

                    <td></td>  
                    <td><?php echo form_input($usuario); ?></td>  
                    <td><?php echo form_input($contrasena); ?></td>  
                    <td class="text-center"><?php echo form_submit($submit); ?></td>
                    <?php
                    echo form_close();
                    ?>

                </tr>



                <?php
                foreach ($usuarios as $u) {
                    ?>
                    <tr>

                        <?php
                        echo form_open(base_url() . 'admin/usuario/actualizar/' . $u->id);
                        $usuario = array(
                            'class' => 'form-control',
                            'name' => 'usuario',
                            'id' => 'usuario',
                            'value' => "$u->Usuario"
                        );
                        $contrasena = array(
                            'class' => 'form-control',
                            'name' => 'contrasena',
                            'id' => 'email',
                            'value' => "$u->Contrasena",
                        );
                        $submit = array(
                            'name' => 'submit',
                            'id' => 'submit',
                            'value' => 'Actualizar',
                            'title' => 'Actualizar',
                            'class' => 'btn btn-primary text-center'
                        );
                        ?>
                        <td class='text-center'><?= $u->id ?></td>
                        <td><?php echo form_input($usuario); ?></td>
                        <td><?php echo form_input($contrasena); ?></td>
                        <td class='text-center'>
                            <?php echo form_submit($submit); ?> 
                            <a href="<?php echo base_url() . 'admin/usuario/eliminar/' . $u->id ?>" class="btn btn-danger text-center">Eliminar</a>
                        </td>

                        <?php
                        echo form_close();
                        ?>

                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
