<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria
 *
 * @author Carito
 */
class Categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('admin/Categoria_model', 'c');
    }

    public function index($pag = 0) {
        $data['categorias'] = $this->c->get_categorias(NULL, $pag);
        /*         * ********** Configuracion de la paginacion ************************ */
        $config['base_url'] = base_url() . 'admin/categoria';
        $config['total_rows'] = $this->c->get_total();
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        /*         * ***************************************************************** */
        $data['activo'] = 'categoria';
        $data['contenido'] = 'admin/categoria';
        $this->load->view('plantilla_admin/plantilla', $data);
    }

    public function do_buscar() {
        $buscar= $this->input->post('buscar');
        redirect(base_url() . 'admin/categoria/buscar/'.$buscar.'/0');
    }

    public function buscar() {
        $data['categorias'] = $this->c->get_categorias($this->uri->segment(4),$this->uri->segment(5));
        $config['base_url'] = base_url() . 'admin/usuario/buscar/'.$this->uri->segment(4);

        /*         * ********** Configuracion de la paginacion ************************ */
        $config['total_rows'] = $this->c->get_total($this->uri->segment(4));
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        /*         * ***************************************************************** */
 
        $data['activo'] = 'categoria';
        $data['contenido'] = 'admin/categoria';
        $this->load->view('plantilla_admin/plantilla',$data);
    }
    
    public function eliminar($id) {
        if ($this->c->eliminar($id) == true)
            $this->index();
        else
            echo 'Esta categoria esta siendo utiliazada';
    }

    public function modificar($id = NULL){
        $data['activo'] = 'categoria';
        if (!isset($_POST['nombre'])) {
            if ($id === NULL) {
                $data['titulo'] = 'NUEVO CATEGORIA';
            } else {
                $data['titulo'] = 'MODIFICAR CATEGORIA';
                $data['categorias'] = $this->u->get($id);
            }
            $data['contenido'] = 'admin/modificar_categoria';
            $this->load->view('plantilla_admin/plantilla', $data);
        } else {
            $nombre = $this->input->post('nombre');
            if ($id === NULL) {
                $this->u->insertar($nombre);
            } else {
                $this->u->actualizar($id, $nombre);
            }
            $this->index();
        }
    }
}

?>
