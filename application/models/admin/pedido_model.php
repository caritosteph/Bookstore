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
    }

    public function get_pedidos($cad = NULL, $pag = 0) {
        if ($cad == NULL) {
            $this->db->select('pedido.id,cliente.Nombre,cliente.Apellidos,pedido.FechaPedido,pedido.FechaRecogo,pedido.TotalCargo,estado.Estado');
            $this->db->from('pedido');
            $this->db->join('cliente', 'pedido.ClienteID=cliente.id', 'inner');
            $this->db->join('estado', 'estado.id=pedido.Estado', 'inner');
            $this->db->order_by("id", "asc");
            $this->db->limit(POR_PAGINA, $pag);
            $sql = $this->db->get()->result();
        } else {
            $this->db->select('pedido.id,cliente.Nombre,cliente.Apellidos,pedido.FechaPedido,pedido.FechaRecogo,pedido.TotalCargo,estado.Estado');
            $this->db->from('pedido');
            $this->db->join('cliente', 'pedido.ClienteID=cliente.id', 'inner');
            $this->db->join('estado', 'estado.id=pedido.Estado', 'inner');
            $this->db->like('cliente.Nombre', $cad);
            $this->db->or_like('cliente.Apellidos', $cad);
            $this->db->order_by("id", "asc");
            $this->db->limit(POR_PAGINA, $pag);
            $sql = $this->db->get()->result();
        }
        return $sql;
    }

    public function get_total($cad = NULL) {
        if ($cad == NULL) {
            $this->db->select('pedido.id,cliente.Nombre,cliente.Apellidos,pedido.FechaPedido,pedido.FechaRecogo,pedido.TotalCargo,estado.Estado');
            $this->db->from('pedido');
            $this->db->join('cliente', 'pedido.ClienteID=cliente.id', 'inner');
            $this->db->join('estado', 'estado.id=pedido.Estado', 'inner');
            $sql = $this->db->get()->num_rows();
        } else {
            $this->db->select('pedido.id,cliente.Nombre,cliente.Apellidos,pedido.FechaPedido,pedido.FechaRecogo,pedido.TotalCargo,estado.Estado');
            $this->db->from('pedido');
            $this->db->join('cliente', 'pedido.ClienteID=cliente.id', 'inner');
            $this->db->join('estado', 'estado.id=pedido.Estado', 'inner');
            $this->db->like('cliente.Nombre', $cad);
            $this->db->or_like('cliente.Apellidos', $cad);
            $sql = $this->db->get()->num_rows();
        }
        return $sql;
    }

    public function get($id) {
        $this->db->select('pedido.id,cliente.Nombre,cliente.Apellidos,pedido.FechaPedido,pedido.FechaRecogo,pedido.TotalCargo,estado.Estado,pedido.IGV,pedido.PrecioSinIGV,pedido.TotalCargo');
        $this->db->from('pedido');
        $this->db->join('cliente', 'pedido.ClienteID=cliente.id', 'inner');
        $this->db->join('estado', 'estado.id=pedido.Estado', 'inner');
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
        $sql = $this->db->get('estado')->result();
        return $sql;
    }

    public function eliminarItemPedido($id) {
        $this->db->delete('itempedido',array('id' => $id));
    }

    public function eliminar($id) {
        $this->db->delete('pedido', array('id' => $id));
    }

    public function actualizar($idp, $fecha, $fechar, $estado) {
        $data = array(
            'FechaPedido' => $fecha,
            'FechaRecogo' => $fechar,
            'Estado' => $estado,
            'PrecioSinIGV' => $_SESSION['nuevoPrecio'],
            'IGV' => $_SESSION['nuevoIGV'],
            'TotalCargo' => $_SESSION['nuevoPrecio'] + $_SESSION['nuevoIGV']
        );
        $this->db->where('id', $idp);
        $this->db->update('pedido', $data);
    }
    
     public function itemPedidos($id) {
        $this->db->select('itempedido.id,libro.Titulo,itempedido.Unidades,libro.Precio,itempedido.PrecioTotal');
        $this->db->from('itempedido');
        $this->db->join('libro', 'itempedido.LibroID=libro.id', 'inner');
        $this->db->where(array('itempedido.PedidoID' => $id));
        $sql = $this->db->get()->result_array();
        return $sql;
    }
}

?>
