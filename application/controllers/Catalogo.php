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
    }

    public function index($libro = NULL) {
        if ($libro == NULL) {
            $this->db->select('l.Titulo ,l.Autor,l.Precio,l.id,l.Imagen,c.Nombre');
            $this->db->from('libro as l');
            $this->db->join('categoria as c', 'c.id=l.categoriaID ', 'inner');
            $libro = $this->db->get()->result();
        }
        $categorias = new Categoria_Model();
        $categorias->get();



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

    public function buscar() {
        $busqueda = $this->input->post('titulo', 'true');
        $libros = new Libro_Model();
        $libros->like('Titulo', $busqueda);
        $libros->or_like('Autor', $busqueda);
        $libros->get();

        $this->index($libros);
    }

}
