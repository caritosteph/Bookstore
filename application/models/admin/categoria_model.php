<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria_model
 *
 * @author Sadhu
 */
class categoria_model extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function get_categorias($cad="") {   
        $sql="SELECT * FROM categoria WHERE Nombre LIKE '%$cad%'";
        $consulta=$this->db->query($sql);
        return $consulta->result();
    }
    
    
    public function eliminar($id){
        $sql="DELETE FROM categoria WHERE id=$id";
        return $this->db->query($sql);
        
    }
}

?>
