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
        $this->db->select('pedido.id,cliente.Nombre,cliente.Apellidos,pedido.FechaPedido,pedido.FechaRecogo,pedido.TotalCargo,pedido.Estado,pedido.IGV,pedido.PrecioSinIGV,pedido.TotalCargo');
        $this->db->from('pedido');
        $this->db->join('cliente', 'pedido.ClienteID=cliente.id', 'inner');
        $this->db->where(array('pedido.id' => $id));
        $sql = $this->db->get()->row();
        return $sql;
    }

    public function itemPedido($id) {
        $this->db->select('itempedido.id,libro.Titulo,itempedido.Unidades,libro.Precio,itempedido.PrecioTotal');
        $this->db->from('itempedido');
        $this->db->join('libro', 'itempedido.LibroID=libro.id', 'inner');
        $this->db->where(array('itempedido.PedidoID' => $id));
        $sql = $this->db->get()->result();
        return $sql;
    }

    public function estados() {
        $this->db->select('Estado');
        $this->db->from('pedido');
        $sql = $this->db->get()->result();
        return $sql;
    }

    public function eliminarItemPedido($id) {
        $this->db->delete('itempedido',array('id' => $id));
    }

    public function eliminar($id) {
        $this->db->delete('pedido', array('id' => $id));
    }

    public function actualizar($id) {
        $data = array(
            'Nombre' => $this->input->post('nombre'),
            'Apellidos' => $this->input->post('apellido'),
            'FechaPedido' => $this->input->post('fecha'),
            'FechaRecogo' => $this->input->post('fechar'),
            'Estado' => $this->input->post('estado')
        );
        $this->db->where('id', $id);
        $this->db->update('pedido', $data);
    }

    public function actualizarItem($id) {
        $data = array(
            'Titulo' => $this->input->post('titulo'),
            'Unidades' => $this->input->post('cantidad'),
            'Precio' => $this->input->post('precio'),
        );
        $this->db->where('id', $id);
        $this->db->update('itempedido', $data);
    }

}

?>
