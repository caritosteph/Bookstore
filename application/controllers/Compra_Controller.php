<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Compra_Controller
 *
 * @author Cristian
 */
class Compra_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['contenido'] = 'cliente/compra';
        $data['activo'] = 'none';

        $cesta = new Cesta();
        $cliente = $this->session->userdata('cliente');
        $data['items'] = $cesta->todos_los_items($cliente['id']);


        $this->load->view('plantilla/plantilla', $data);
    }

    public function exito() {
        print_r($_POST);
    }

    public function error() {
        echo 'error en la compra';
    }

    public function paypal() {
        echo 'info adicional';
    }

}
