<?php

$this->load->helper('checkCookie_helper');
check();

$this->load->view('plantilla/header');
$this->load->view('plantilla/navegacion');
$this->load->view($contenido);
$this->load->view('plantilla/footer');
?>