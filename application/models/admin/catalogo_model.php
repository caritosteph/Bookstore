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
    }
    
    public function get_libros($cad=NULL, $pag=1) {
        if($cad==NULL)
            $sql="SELECT l.*, c.Nombre as nombreCategoria FROM libro l JOIN categoria c ON l.CategoriaID=c.id";
        else
            $sql="SELECT l.*, c.Nombre as nombreCategoria FROM libro l JOIN categoria c ON l.CategoriaID=c.id WHERE l.Titulo LIKE '%$cad%' OR l.Autor LIKE '%$cad%'";
        
        $query=$this->db->query($sql." LIMIT ".(($pag-1)*round($this->get_total()/POR_PAGINA)).", ".POR_PAGINA);
        return $query->result();
    }
    
    public function get_total($cad=NULL) {
        if($cad==NULL)
            $sql="SELECT l.*, c.Nombre as nombreCategoria FROM libro l JOIN categoria c ON l.CategoriaID=c.id";
        else
            $sql="SELECT l.*, c.Nombre as nombreCategoria FROM libro l JOIN categoria c ON l.CategoriaID=c.id WHERE l.Titulo LIKE '%$cad%' OR l.Autor LIKE '%$cad%'";
        $query=$this->db->query($sql);
        return $query->num_rows();
    }
    
    
    public function eliminar($id) {
        $sql="DELETE FROM libro WHERE id=$id";
        $this->db->query($sql);
    }
    
    public function insertar() {
        $sql="INSERT INTO libro (id, Titulo, Autor, Detalle, CategoriaID, Precio, Existencias) VALUES (null,'".$_POST['titulo']."', '".$_POST['autor']."', '".$_POST['descripcion']."','".$_POST['categoria']."','".$_POST['precio']."','".$_POST['cantidad']."')";
        $this->db->query($sql);
    }
    
    public function actualizar($id) {
        $sql="UPDATE libro SET Titulo='".$_POST['titulo']."', Autor= '".$_POST['autor']."', Detalle='".$_POST['descripcion']."', CategoriaID='".$_POST['categoria']."', Precio='".$_POST['precio']."', Existencias='".$_POST['cantidad']."' WHERE id=$id";
        $this->db->query($sql);
    }


    public function get_categorias() {
        $sql="SELECT * FROM categoria";
        $query=$this->db->query($sql);
        return $query->result();
    }
    
    public function get($id) {
        $sql="SELECT * FROM libro WHERE id=$id";
        $query=  $this->db->query($sql);
        return $query->row();
    }
           
}

?>
