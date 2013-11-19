<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Catalogo_Model
 *
 * @author Sadhu
 */
class Catalogo_model extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_libros() {
        $sql="SELECT l.*, c.Nombre nombreCategoria FROM libro l JOIN categoria c ON l.CateogoriaID=c.id";
        $query=$this->db->query($sql);
        return $query->result();
    }
}

?>
