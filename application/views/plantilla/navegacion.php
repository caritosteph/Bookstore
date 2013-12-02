
<!-- HEADER -->
<div class="header">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                      
            <div class="row_header ">
                <div class="col-md-8"><a href="<?php echo base_url(); ?>home/" class="navbar-brand nav-text logo" style="text-align:center; font-family: 'helvetic';">UNIVERSIDAD NACIONAL MAYOR DE SAN MARCOS <strong style="font-size:22px;">FONDO EDITORIAL</strong></a></div>
                <div class="col-md-4"><img style='margin-left:-40px' src="<?= base_url()?>img/escudo.png"></div>
            </div>
            
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse color1" role="navigation" >
            <ul class="nav navbar-nav navbar-right">
                <!--visitante-->
                <?php if ($this->session->userdata('cliente') == FALSE) { ?>
                    <li class="<?= $activo == 'registro' ? 'active' : 'barra_derecha' ?> "><a class="nav-text" href="<?php echo base_url(); ?>cliente/registro"> Regístrate</a></li>
                    <li class="dropdown  barra_derecha">
                        <a class="nav-text" href="<?= base_url()?>cliente/showLogin" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span>  Iniciar Sesión <b class="caret"></b>
                        </a>
                        <div class="dropdown-menu">
                            <form method="post" action="<?php echo base_url(); ?>cliente/login">
                                <input class="form-control" type="email" placeholder="E-mail" id="email" name="email" required />
                                <input class="form-control" type="password" placeholder="Contraseña" id="password" name="password" required>
                                <label>
                                    <input type="checkbox" name="recordar">Recordarme
                                </label>
                                <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
                            </form>
                        </div>
                    </li>
                    <?php
                } else {
                    $array_sesion = $this->session->userdata('cliente');
                    ?>
                    <!--logueado-->
                    <li class="dropdown">
                        <a class="nav-text" href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span>  <?= $array_sesion['nombre']?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>cliente/perfil">Mi perfil</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Configuración</a></li>
                            <li><a href="<?php echo base_url(); ?>cliente/logout">Cerrar Sesión</a></li>
                        </ul>
                    </li>

                <?php } ?> 
            </ul>
            
            <div style="margin-top: 20px;">
                <a href="https://www.facebook.com/fondoeditorial.unmsm"><img style=" margin-left: 420px;" src="<?= base_url()?>img/facebook.png" alt="" height="45px" width="45px"></a>
                 <a href="http://unmsmnoticiasfondoeditorial.blogspot.com/"><img style=" margin-left: 5px;" src="<?= base_url()?>img/rss.png" alt="" height="45px" width="45px"></a>
                        
            </div>
        </div>
        
    
        <div class="collapse navbar-collapse navbar-ex1-collapse color2 redondear" role="navigation">
            <ul class="nav nav-justified">
             
                <li class="<?= $activo == 'inicio' ? 'active ' : 'barra' ?>"><a href="<?php echo base_url(); ?>home/" class="nav-text"> <span class="glyphicon glyphicon-home"></span> INICIO</a></li>
                <li class="<?= $activo == 'nosotros' ? 'active' : 'barra' ?>"><a href="<?php echo base_url(); ?>nosotros" class="nav-text"> <span class="glyphicon glyphicon-briefcase"></span> NOSOTROS</a></li>
                <li class="<?= $activo == 'catalogo' ? 'active' : 'barra' ?>"><a href="<?php echo base_url(); ?>catalogo" class="nav-text"> <span class="glyphicon glyphicon-book"></span> CATÁLOGO</a></li>
                <li class="<?= $activo == 'carrito' ? 'active' : 'barra' ?>"><a href="<?php echo base_url(); ?>carrito" class="nav-text"> <span class="glyphicon glyphicon-shopping-cart"></span> CARRITO</a></li>
                <li class="<?= $activo == 'contacto' ? 'active' : 'barra' ?>"><a href="<?php echo base_url(); ?>contacto" class="nav-text"> <span class="glyphicon glyphicon-edit"></span> CONTACTO</a></li>
            </ul>
        </div>
   
</div>
