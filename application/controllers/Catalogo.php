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
class Catalogo extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
    }

    public function index($libro = NULL,$t=0) {
        $total = 0;
        if ($libro == NULL) {
            $total = $this->db->count_all_results('libro');  //obtengo el total de libros
            
            $this->db->select('l.Titulo ,l.Autor,l.Precio,l.id,l.Imagen,c.Nombre');
            $this->db->from('libro as l');
            $this->db->join('categoria as c', 'c.id=l.categoriaID ', 'inner');
                    
            $libro = $this->db->get('',POR_PAGINA, $this->uri->segment(3))->result();
        }else{
            $total = $t;
        }

        $categorias = new Categoria_Model();
        $categorias->get();
        
        /************ Configuracion de la paginacion *************************/
        
        $config['base_url'] = base_url() . 'catalogo/pagina/';
        $config['total_rows'] = $total;
        $config['per_page'] = POR_PAGINA;
        $config['uri_segment'] = 3;
        
        $this->pagination->initialize($config);

        /********************************************************************/
        
        $data['libros'] = $libro;
        $data['categorias'] = $categorias;
        $data['activo'] = 'catalogo';
        $data['contenido'] = 'visitante/catalogo';
        $this->load->view('plantilla/plantilla', $data);
    }

    public function detalles($idLibro) {
        $libro = new Libro_Model();
        $libro->where('id', $idLibro);
        $libro->get();

        $data['libro'] = $libro;
        $data['activo'] = 'catalogo';
        $data['contenido'] = 'visitante/detalle';
        $this->load->view('plantilla/plantilla', $data);
    }
    
    /* Revisar la busqueda */
    
    public function do_search(){
        $titulo = $this->input->post('titulo');
        redirect( base_url(). 'catalogo/buscar/'.$titulo);
    }
    
    public function buscar($titulo=NULL) {
        
        $libros = new Libro_Model();
        $libros->like('Titulo', $titulo);
        $libros->or_like('Autor', $titulo);
        $t = $libros->count();
        
        $libros = new Libro_Model();
        $libros->like('Titulo', $titulo);
        $libros->or_like('Autor', $titulo);
        $libros->get(POR_PAGINA, $this->uri->segment(3));

        $this->index($libros,$t);
    }

}
