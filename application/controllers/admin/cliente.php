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

    public function interruptor($id) {
        $this->cliente_model->interruptor($id);
        $this->index();
    }

    public function modificar($id = NULL) {
        $menu['activo'] = 'cliente';
        
        if (!isset($_POST['nombre'])) {
            if ($id === NULL) {
                $datos['titulo'] = 'NUEVO CLIENTE';
            } else {
                $datos['titulo'] = 'MODIFICAR CLIENTE';
                $datos['cliente'] = $this->cliente_model->get($id);
            }

            $this->load->view('plantilla_admin/header', $menu);
            $this->load->view('admin/modificar_cliente', $datos);
            $this->load->view('plantilla_admin/footer');
        } else {
            if($_POST['contrasena']!=$_POST['confirmar']){
                if ($id === NULL) {
                $datos['titulo'] = 'NUEVO CLIENTE';
            } else {
                $datos['titulo'] = 'MODIFICAR CLIENTE';
                $datos['cliente'] = $this->cliente_model->get($id);
            }
            $datos['titulo'].=" - Las contrseñas no coinciden";
            $this->load->view('plantilla_admin/header', $menu);
            $datos['msj']="Las contraseñas no coinciden";
            $this->load->view('admin/modificar_cliente', $datos);
            $this->load->view('plantilla_admin/footer');
                return;
            }
            if ($id == NULL) {
                $this->cliente_model->insertar();
            } else {
                $this->cliente_model->actualizar($id);
            }
            $this->index();
        }
    }

}

?>
