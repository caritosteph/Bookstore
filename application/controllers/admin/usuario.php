<?php

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Usuario_model', 'u');
    }

    public function index() {

        $data['activo'] = 'administrador';
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
        $this->u->actualizar($id, $usuario, $contrasena);
        $this->index();
    }

    public function insertar() {

        $data['activo'] = 'administrador';

        $usuario = $this->input->post('nombre', true);
        $email = $this->input->post('email', true);
        $contrasena = $this->input->post('contrasena', true);
        $confirmar = $this->input->post('confirmar', true);
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback__unicoCorreo');
        $this->form_validation->set_rules('contrasena', 'Contrasena', 'required');
        $this->form_validation->set_rules('confirmar', 'Confirmar Contraseña', 'required|matches[contrasena]');
        if ($this->form_validation->run() == FALSE) {
            $data['titulo'] = 'NUEVO ADMINISTRADOR';
            $data['contenido'] = 'admin/modificar_usuario';
            $this->load->view('plantilla_admin/plantilla', $data);
        } else {
            $this->u->insertar($usuario, $email, $contrasena);
            $this->index();
        }
    }

}
