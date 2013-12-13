<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perfil
 *
 * @author Carito
 */
class Perfil_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get($nombre) {
        $sql = "SELECT * FROM cliente WHERE Nombre='$nombre'";
        $query = $this->db->query($sql);
        return $query->row();
    }

//    public function actualizar($nombre) {
//
//        $sql = "UPDATE cliente SET Nombre='" . $_POST['nombre'] . "',Apellidos='" . $_POST['apellido'] . "',EMail='" . $_POST['email'] . "',Direccion='" . $_POST['direccion'] . "', Telefono='" . $_POST['telefono'] . "', Contrasena='" . $_POST['contrasena'] . "' WHERE Nombre='$nombre'";
//        $this->db->query($sql);
//    }

//    public function getpedido($id) {
//        $this->db->select('pedido.id,cliente.Nombre,cliente.Apellidos,pedido.FechaPedido,pedido.FechaRecogo,pedido.TotalCargo,estado.Estado,pedido.IGV,pedido.PrecioSinIGV,pedido.TotalCargo');
//        $this->db->from('pedido');
//        $this->db->join('cliente', 'pedido.ClienteID=cliente.id', 'inner');
//        $this->db->join('estado', 'estado.id=pedido.Estado', 'inner');
//        $this->db->where(array('pedido.id' => $id));
//        $sql = $this->db->get()->row();
//        return $sql;
//    }
}

?>
