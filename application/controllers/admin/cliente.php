<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cliente
 *
 * @author Sadhu
 */
class Cliente extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/cliente_model');
    }

    public function index($pag = 0) {

        $menu['activo'] = 'cliente';
        $datos['total'] = round($this->cliente_model->get_total() / POR_PAGINA);
        $datos['clientes'] = $this->cliente_model->get_clientes(isset($_GET['cliente']) ? $_GET['cliente'] : "", $datos['total'], $pag);

        $this->load->view('plantilla_admin/header', $menu);
        $this->load->view('admin/cliente', $datos);
        $this->load->view('plantilla_admin/footer');
    }

    public function eliminar($id) {
        $this->cliente_model->eliminar($id);

        $this->index();
    }

    public function modificar() {
        $data['activo']='cliente';
        $data['titulo']='NUEVO CLIENTE';
        $data['contenido']='admin/modificar_cliente';
        $this->load->view('plantilla_admin/plantilla', $data);
    }

}

?>
