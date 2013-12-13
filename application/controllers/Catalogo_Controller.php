<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Catalogo
 *
 * @author Cristian
 */
class Catalogo_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $titulo = NULL;
    }

    public function index() {
        //obtengo el total de libros       
        $l = new Libro();
        $libro = $l->get_Libros_($this->uri->segment(3));
        $total = $libro['size_result'];

        $categorias = new Categoria();
        $categorias->get();

        /*         * ********** Configuracion de la paginacion ************************ */

        $config['base_url'] = base_url() . 'catalogo/pagina/';
        $config['total_rows'] = $total;
        $config['per_page'] = POR_PAGINA;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        /*         * ***************************************************************** */

        $data['libros'] = $libro['result'];
        $data['categorias'] = $categorias;
        $data['activo'] = 'catalogo';
        $data['contenido'] = 'visitante/catalogo';
        $this->load->view('plantilla/plantilla', $data);
    }

    public function detalles($idLibro) {
        $libro = new Libro();
        $libro->where('id', $idLibro);
        $libro->get();

        $data['libro'] = $libro;
        $data['activo'] = 'catalogo';
        $data['contenido'] = 'visitante/detalle';
        $this->load->view('plantilla/plantilla', $data);
    }

    /* Revisar la busqueda */

    public function do_search() {
        $titulo = $this->input->post('titulo');
        redirect(base_url() . 'catalogo/buscar/' . urlencode($titulo));
    }

    public function buscar($titulo = NULL) {
        
        if (!$titulo) {
            $titulo = NULL;
        }else{
            $t = urldecode($titulo);
        }
        $l = new Libro();
        $resultado = $l->get_Libros($this->uri->segment(5), $t, NULL);
        $libro = $resultado['result'];
        $total = $resultado['size_result'];



        $config['base_url'] = base_url() . 'catalogo/buscar/' . $titulo . '/pagina';
        $config['total_rows'] = $total;
        $config['per_page'] = POR_PAGINA;
        $config['uri_segment'] = 5;

        $this->pagination->initialize($config);

        $categorias = new Categoria();
        $categorias->get();

        $data['libros'] = $libro;
        $data['categorias'] = $categorias;
        $data['activo'] = 'catalogo';
        $data['contenido'] = 'visitante/catalogo';
        $data['busqueda'] = $t;
        $this->load->view('plantilla/plantilla', $data);
    }

}
