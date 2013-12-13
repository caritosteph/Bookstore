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
        $config['total_rows'] = $this->cliente_model->get_total();
        $config['base_url'] = base_url() . 'admin/cliente';
        $this->pagination->initialize($config);
        
        $menu['activo'] = 'cliente';
        $datos['clientes'] = $this->cliente_model->get_clientes(isset($_GET['cliente']) ? $_GET['cliente'] : "", $pag);

        $this->load->view('plantilla_admin/header', $menu);
        $this->load->view('admin/cliente', $datos);
        $this->load->view('plantilla_admin/footer');
    }
    
    
    public function do_buscar() {
        redirect(base_url() . 'admin/cliente/buscar/' . $_GET['cliente'].'/0');
    }
    
    public function buscar() {
        
        $config['total_rows'] = $this->cliente_model->get_total($this->uri->segment(4));
        $config['base_url'] = base_url() . 'admin/cliente/buscar/'. $this->uri->segment(4);
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        
        $menu['activo'] = 'cliente';
        $datos['clientes'] = $this->cliente_model->get_clientes(str_replace('%20', ' ', $this->uri->segment(4)), $this->uri->segment(5)!=NULL?$this->uri->segment(5):0);

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
            if($this->cliente_model->existe($_POST['email'])){
                $repetidos=$this->cliente_model->get_clientes($_POST['email']);
                foreach ($repetidos as $repetido) {
                   if($id == NULL||$repetido->id!=$id){
                       echo 'Ese correo ya existe'; 
                       return;
                    }
                }
                
            }
            if ($_POST['contrasena'] != $_POST['confirmar']) {
                if ($id === NULL) {
                    $datos['titulo'] = 'NUEVO CLIENTE';
                } else {
                    $datos['titulo'] = 'MODIFICAR CLIENTE';
                    $datos['cliente'] = $this->cliente_model->get($id);
                }
                $datos['error'] = "Las contraseñas no coinciden";
                $this->load->view('plantilla_admin/header', $menu);
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
