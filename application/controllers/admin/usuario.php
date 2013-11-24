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

    public function modificar($id = NULL) {
        $data['activo'] = 'administrador';
        if (!isset($_POST['titulo'])) {
            if ($id === NULL) {
                $data['titulo'] = 'NUEVO ADMINISTRADOR';
            } else {
                $data['titulo'] = 'MODIFICAR ADMINISTRADOR';
                $data['usuarios'] = $this->u->get($id);
            }
            $data['contenido'] = 'admin/modificar_usuario';
            $this->load->view('plantilla_admin/plantilla',$data);
        } else {
            $usuario = $this->input->post('nombre');
            $email = $this->input->post('email');
            $contrasena = $this->input->post('contrasena');
            if ($id == NULL) {
                $this->u->insertar($usuario, $email, $contrasena);
            } else {
                $this->u->actualizar($id, $usuario, $email, $contrasena);
            }
            $this->index();
        }
    }

}
