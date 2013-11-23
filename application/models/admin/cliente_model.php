<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cliente_model
 *
 * @author Sadhu
 */
class Cliente_model extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_clientes($cad="", $total, $pag=0) {
        $sql="SELECT * FROM cliente WHERE Nombre LIKE '%$cad%' OR Apellidos LIKE '%$cad%' OR EMail LIKE '%$cad%' LIMIT ".$pag*$total.",".POR_PAGINA;
        $consulta=$this->db->query($sql);
        return $consulta->result();
    }
    
    public function get_total($cad="") {
        $sql="SELECT * FROM cliente WHERE Nombre LIKE '%$cad%' OR Apellidos LIKE '%$cad%' OR EMail LIKE '%$cad%'";
        $consulta=$this->db->query($sql);
        return $consulta->num_rows();
        
    }
    
    public function get($id) {
    $sql="SELECT * FROM cliente WHERE id=$id";
    $query=  $this->db->query($sql);
    return $query->row();
    }


    public function eliminar($id){
        $sql="DELETE FROM cliente WHERE id=$id";
        $this->db->query($sql);
        
    }

    public function insertar() {
        $sql="INSERT INTO cliente (Nombre,Apellidos,EMail) VALUES ('$_POST[nombre]]',".$_POST[apellido].", ".$_POST[email].")";
        $this->db->query($sql);
    }


}

?>
