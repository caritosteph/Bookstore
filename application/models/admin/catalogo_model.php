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
    
    public function get_libros($cad=NULL) {
        if($key==NULL)
            $sql="SELECT l.*, c.Nombre as nombreCategoria FROM libro l JOIN categoria c ON l.CategoriaID=c.id";
        else
            $sql="SELECT l.*, c.Nombre as nombreCategoria FROM libro l JOIN categoria c ON l.CategoriaID=c.id WHERE l.Nombre LIKE %$cad% OR l.Autor LIKE %$cad%";
        $query=$this->db->query($sql);
        return $query->result();
    }
    
    public function eliminar($id) {
        $sql="DELETE FROM libro WHERE id=$id";
        $this->db->query($sql);
    }
    
    public function insertar() {
        $sql="INSERT INTO libro (id, Titulo, Autor, Detalle, CategoriaID) VALUES (null,'".$_POST['titulo']."', '".$_POST['autor']."', '".$_POST['descripcion']."',1)";
        $this->db->query($sql);
    }
}

?>
