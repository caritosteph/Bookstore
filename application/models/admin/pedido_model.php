<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pedido_model
 *
 * @author Sadhu
 */
class Pedido_model extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_pedidos($cad = "") {
        $this->db->select('pedido.id,cliente.Nombre,cliente.Apellidos,pedido.FechaPedido,pedido.FechaRecogo,pedido.TotalCargo,pedido.Estado');
        $this->db->from('pedido');
        $this->db->join('cliente', 'pedido.ClienteID=cliente.id', 'inner');
        $this->db->like('cliente.Nombre', $cad);
        $this->db->or_like('cliente.Apellidos', $cad);
        $sql = $this->db->get()->result();
        return $sql;
    }

    public function get($id) {
        $this->db->select('pedido.id,cliente.Nombre,cliente.Apellidos,pedido.FechaPedido,pedido.FechaRecogo,pedido.TotalCargo,pedido.Estado');
        $this->db->from('pedido');
        $this->db->join('cliente', 'pedido.ClienteID=cliente.id', 'inner');
        $this->db->where(array('pedido.id' => $id));
        $sql = $this->db->get()->row();
        return $sql;
    }

    public function itemPedido($id) {
        $this->db->select('libro.Titulo,itempedido.Unidades,libro.Precio,itempedido.PrecioTotal');
        $this->db->from('itempedido');
        $this->db->join('libro', 'itempedido.LibroID=libro.id', 'inner');
        $this->db->where(array('pedido.id' => $id));
        $sql = $this->db->get()->result();
        return $sql;
    }

}

?>
