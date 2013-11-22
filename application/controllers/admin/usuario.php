<?php

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Usuario_model','u');
    }
    public function index() {

        $data['activo']='administrador';
        $data['usuarios'] = $this->u->get_usuarios();
        $data['contenido'] = 'admin/usuario';
        $this->load->view('plantilla_admin/plantilla', $data);
        
    }
    
    public function eliminar($id) {
        $this->u->eliminar($id);
        $this->index();
    }

    public function modificar($param) {
        
        
    }
    public function actualizar($id) {
        $usuario = $this->input->post('usuario');
        $contrasena = $this->input->post('contrasena');
        $this->u->actualizar($id, $usuario,$contrasena);
        $this->index();
    }

    
    public function insertar() {
        
        $data['activo']='administrador';
        $data['titulo']='NUEVO ADMINISTRADOR';
        $data['contenido']='admin/modificar_usuario';
        $this->load->view('plantilla_admin/plantilla', $data);
//        $usuario = $this->input->post('usuario');
//        $contrasena = $this->input->post('contrasena');
//        $this->u->insertar($usuario,$contrasena);
//        $this->index();
    }
    
    

}