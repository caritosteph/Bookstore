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
        
        $sql="SELECT * FROM cliente WHERE Nombre LIKE '%$cad%' OR Apellidos LIKE '%$cad%' OR EMail LIKE '%$cad%' LIMIT ".$pag*POR_PAGINA.",".POR_PAGINA;
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
        $sql="INSERT INTO cliente (Nombre,Apellidos,EMail, Direccion, Telefono, Contrasena) VALUES ('".$_POST['nombre']."', '".$_POST['apellido']."', '".$_POST['email']."', '".$_POST['direccion']."', '".$_POST['telefono']."', '".$_POST['contrasena']."')";
        $this->db->query($sql);
    }
    
    public function actualizar($id) {
     
        $sql="UPDATE cliente SET Nombre='".$_POST['nombre']."',Apellidos='".$_POST['apellido']."',EMail='".$_POST['email']."',Direccion='".$_POST['direccion']."', Telefono='".$_POST['telefono']."', Contrasena='".$_POST['contrasena']."' WHERE id=$id";
        $this->db->query($sql);
    }
    
    public function interruptor($id) {
        $sql="SELECT * FROM cliente WHERE id=$id";
        $query=  $this->db->query($sql);
        $est=$query->row()->Estado;
        $sql="UPDATE cliente SET Estado='".($est+1)%2 ."' WHERE id=$id";
        $this->db->query($sql);
    }

}

?>
