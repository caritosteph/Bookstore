<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perfil
 *
 * @author Carito
 */
class Perfil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Perfil_model', 'p');
    }

    function informacion() {
        $data['activo'] = 'none';
        $nombre = $this->session->userdata('cliente');
        $data['usuario'] = $this->p->get($nombre['nombre']);
        $data['contenido'] = 'cliente/perfil';
        $this->load->view('plantilla/plantilla', $data);
    }

    function cambiarcontrasena() {
        
    }

    function pedidos() {
        
    }

    public function modificar() {
        $nombre = $this->session->userdata('cliente');
        $this->p->actualizar($nombre['nombre']);
        $this->informacion();
    }

}

?>
