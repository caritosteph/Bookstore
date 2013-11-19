<?php

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Usuario_model','u');
    }
    public function index() {
//       
//        $pagination = 5;
//        $total = $this->u->get_usuarios_cantidad();
        $data['usuarios'] = $this->u->get_usuarios();
//        $config['base_url'] = base_url().'admin/usuario/index/'; 
//        $config['total_rows'] = $total;
//        $config['per_page'] = $pagination; 
//        $config['uri_segment'] = 3;
//        $data['pag_links']= $this->pagination->initialize($config); 
////        $config['num_links'] = 5;
////        $config['next_link'] = 'Siguiente >>';
////        $config['prev_link'] = '<< Anterior';
        $data['contenido'] = 'admin/usuario';
        $this->load->view('plantilla_admin/plantilla', $data);
        
    }

    public function eliminar($id) {
        $this->u->eliminar($id);
        $this->index();
    }

    public function actualizar($id) {
        $usuario = $this->input->post('usuario');
        $contrasena = $this->input->post('contrasena');
        $this->u->actualizar($id, $usuario,$contrasena);
        $this->index();
    }

    public function insertar() {
        $usuario = $this->input->post('usuario');
        $contrasena = $this->input->post('contrasena');
        $this->u->insertar($usuario,$contrasena);
        $this->index();
    }
    
    

}