<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pedido
 *
 * @author Carito
 */
class Pedido extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Pedido_model', 'p');
    }

    public function index($cad="") {
        $data['activo'] = 'pedido';
        $data['pedidos'] = $this->p->get_pedidos(isset($_GET['pedido']) ? $_GET['pedido'] : "");
        $data['contenido'] = 'admin/pedido';
        $this->load->view('plantilla_admin/plantilla', $data);

    }
    
    public function detalle($id) {
        $data['activo'] = 'pedido';
        $data['titulo']='DETALLE PEDIDO';
        $data['pedido'] = $this->p->get($id);
        $data['libro'] = $this->p->itemPedido($id);
        $data['contenido'] = 'admin/detalle_pedido';
        $this->load->view('plantilla_admin/plantilla', $data);
    }
    public function modificar($id){
        $data['activo'] = 'pedido';
        $data['titulo']='MODIFICAR PEDIDO';
        $data['pedido'] = $this->p->get($id);
        $data['estado'] = $this->p->estados();
        $data['libro'] = $this->p->itemPedido($id);
        $data['contenido'] = 'admin/modificar_pedido';
        $this->load->view('plantilla_admin/plantilla', $data);
    }


}

?>
