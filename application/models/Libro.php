<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Libro
 *
 * @author Cristian
 */
class Libro extends DataMapper {

    var $table = 'libro';
    
    public function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    public function size() {
        return $this->db->count_all_results('libro');
    }
    public function get_Libros_($url){
        return $this->get_Libros($url,NULL, NULL);
    }
    public function size_search($busqueda = NULL, $categoria = NULL){
        $this->db->select('l.Titulo ,l.Autor,l.Precio,l.id,l.Imagen,c.Nombre');
        $this->db->from('libro as l');
        $this->db->join('categoria as c', 'c.id=l.categoriaID ');        
        if($categoria != NULL){
            $this->db->where('c.Nombre',$categoria);
        }
        if($busqueda!=NULL){
            $this->db->like('l.Titulo',$busqueda);
            $this->db->or_like('l.Autor',$busqueda);
        }
        $this->db->order_by("titulo", "asc");
        
        
        return $this->db->count_all_results();
    }
    public function get_Libros($url, $busqueda = NULL, $categoria = NULL) {
         $total = $this->size_search($busqueda,$categoria);
        
        
        $this->db->select('l.Titulo ,l.Autor,l.Precio,l.id,l.Imagen,c.Nombre');
        $this->db->from('libro as l');
        $this->db->join('categoria as c', 'c.id=l.categoriaID ');        
        if($categoria != NULL){
            $this->db->where('c.Nombre',$categoria);
        }
        if($busqueda!=NULL){
            $this->db->like('l.Titulo',$busqueda);
            $this->db->or_like('l.Autor',$busqueda);
        }
        $this->db->order_by("titulo", "asc");
        
        return array ('result'=>$this->db->get('',POR_PAGINA,$url)->result(),
                      'size_result' => $total);
    }

}
