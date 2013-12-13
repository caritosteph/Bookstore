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
    
    public function get_libros($cad=NULL, $pag=0) {
        if($cad==NULL)
            $sql="SELECT l.*, c.Nombre as nombreCategoria FROM libro l JOIN categoria c ON l.CategoriaID=c.id ORDER BY l.id";
        else
            $sql="SELECT l.*, c.Nombre as nombreCategoria FROM libro l JOIN categoria c ON l.CategoriaID=c.id WHERE l.Titulo LIKE '%$cad%' OR l.Autor LIKE '%$cad%' OR c.Nombre LIKE '%$cad%' ORDER BY l.id";
        
        $query=$this->db->query($sql." LIMIT ".$pag.", ".POR_PAGINA);
        return $query->result();
    }
    
    public function get_total($cad=NULL) {
        if($cad==NULL)
            $sql="SELECT l.*, c.Nombre as nombreCategoria FROM libro l JOIN categoria c ON l.CategoriaID=c.id";
        else
            $sql="SELECT l.*, c.Nombre as nombreCategoria FROM libro l JOIN categoria c ON l.CategoriaID=c.id WHERE l.Titulo LIKE '%$cad%' OR l.Autor LIKE '%$cad%' OR c.Nombre LIKE '%$cad%'";
        $query=$this->db->query($sql);
        return $query->num_rows();
    }
    
    
    public function eliminar($id) {
        $sql="DELETE FROM libro WHERE id=$id";
        $this->db->query($sql);
    }
    
    public function insertar() {
        $sql="INSERT INTO libro (id, Titulo, Autor, Detalle, CategoriaID, Precio, Existencias,Imagen) VALUES (null,'".$_POST['titulo']."', '".$_POST['autor']."', '".$_POST['descripcion']."','".$_POST['categoria']."','".$_POST['precio']."','".$_POST['cantidad']."', '".$_FILES['imagen']['name']."')";
        $this->db->query($sql);
    }
    
    public function actualizar($id) {
        
        $sql="UPDATE libro SET Titulo='".$_POST['titulo']."', Autor= '".$_POST['autor']."', Detalle='".$_POST['descripcion']."', CategoriaID='".$_POST['categoria']."', Precio='".$_POST['precio']."', Existencias='".$_POST['cantidad']."', Imagen='".(strlen($_FILES['imagen']['name'])>0?$_FILES['imagen']['name']:$_POST['oculto'])."' WHERE id=$id";
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
