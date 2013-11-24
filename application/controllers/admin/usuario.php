<?php

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Usuario_model', 'u');
    }

    public function index($cad = "") {
        $data['activo'] = 'administrador';
        $data['usuarios'] = $this->u->get_usuarios(isset($_GET['usuario']) ? $_GET['usuario'] : "");
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
            $this->load->view('plantilla_admin/plantilla', $data);
        } else {
            if ($id == NULL) {
                $this->u->insertar();
            } else {
                $this->u->actualizar($id);
            }
            $this->index();
        }
    }

}
