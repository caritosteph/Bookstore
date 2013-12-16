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
        $data['pag']= $this->pagination->create_links();
        $data['activo'] = 'categoria';
        $data['contenido'] = 'admin/categoria';
        
        $this->load->view('plantilla_admin/plantilla', $data);
    }

    public function do_buscar() {
        $buscar= $this->input->post('buscar');
        if($buscar=='')
            redirect(base_url() . 'admin/categoria');
        else
            redirect(base_url() . 'admin/categoria/buscar/'.urlencode($buscar).'/0');
    }

    public function buscar() {
        $cad=  urldecode($this->uri->segment(4));
        $data['categorias'] = $this->c->get_categorias($cad,$this->uri->segment(5)==null?0:$this->uri->segment(5));
        $config['base_url'] = base_url() . 'admin/usuario/buscar/'.$this->uri->segment(4);

        /*         * ********** Configuracion de la paginacion ************************ */
        $config['total_rows'] = $this->c->get_total($cad);
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        /*         * ***************************************************************** */
        $data['pag']=$this->pagination->create_links();
        $data['activo'] = 'categoria';
        $data['contenido'] = 'admin/categoria';
        $this->load->view('plantilla_admin/plantilla',$data);
    }
    
    public function eliminar($id) {
        if ($this->c->eliminar($id) == true)
           redirect(base_url() . 'admin/categoria/' . $_SESSION['atras']);
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
                $data['categorias'] = $this->c->get($id);
            }
            $data['contenido'] = 'admin/modificar_categoria';
            $this->load->view('plantilla_admin/plantilla', $data);
        } else {
            $nombre = $this->input->post('nombre');
            if ($id === NULL) {
                $this->c->insertar($nombre);
            } else {
                $this->c->actualizar($id, $nombre);
            }
           redirect(base_url() . 'admin/categoria/' . $_SESSION['atras']);
        }
    }
}

?>
