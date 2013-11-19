<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tienda Virtual</title>

    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/app.css" rel="stylesheet">
    
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  </head>
  <body>
      
      <div class="navbar navbar-default" role="navigation">
          <div class="container">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a href="#" class="navbar-brand"><strong>Tienda Virtual</strong></a>
              </div>
              <div class="collapse navbar-collapse navbar-ex1-collapse" role="navigation">
                  <ul class="nav navbar-nav navbar-right">
                      <li><a href="#"> <span class="glyphicon glyphicon-user"></span> ADMINISTRADOR</a></li>
                      <li><a href="../visitante/index.html"> <span class="glyphicon glyphicon-remove"></span> SALIR</a></li>
                  </ul>
                  </ul>
              </div>
          </div>
  </div>
  <div class="container">
    
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <h1>PANEL DE CONTROL</h1>
          <hr>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills">
<li class="<?= $activo == 'catalogo' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>admin/catalogo">Catálogo</a></li>
          <li class="<?= $activo == 'usuario' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>admin/suario">Usuarios</a></li>
          <li class="<?= $activo == 'categoria' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>admin/categoria">Categorías</a></li>
          <li class="<?= $activo == 'cliente' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>admin/cliente">Clientes</a></li>
          <li class="<?= $activo == 'pedido' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>admin/pedido">Pedidos</a></li>
        </ul>  
      </div>
    </div>
      