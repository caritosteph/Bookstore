<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Compra_Controller
 *
 * @author Cristian
 */
class Compra_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['contenido'] = 'cliente/compra';
        $data['activo'] = 'none';

        $cesta = new Cesta();
        $cliente = $this->session->userdata('cliente');
        $data['items'] = $cesta->todos_los_items($cliente['id']);


        $this->load->view('plantilla/plantilla', $data);
    }

    public function exito() {
        $this->_crear_pedido();
        redirect(base_url().'catalogo');
    }

    public function error() {
        echo 'error en la compra';
    }

    public function paypal() {
        $this->_crear_pedido();        
    }
    function _crear_pedido(){
        
        $cesta = new Cesta();
        $cliente = $this->session->userdata('cliente');
        $cesta->where('ClienteID', $cliente['id']);
        $cesta->get();
        
        $items = $cesta->todos_los_items($cliente['id']);
        //se realiza el pedido
        
        $total=0.0;
        
        
        $pedido = new Pedido();
        $pedido->ClienteID = $cliente['id'];
        $pedido->FechaPedido = date("y-m-d");
        $pedido->Estado=6;
        
        $pedido->save();
        
        foreach ($items as $item) {
            $itempedido = new Itempedido();
            $itempedido->PedidoID=$pedido->id;
            $itempedido->LibroID=$item->libroID;
            
            
            //reducir stock de los libros
            
            $libro = new Libro($item->libroID);
            if($item->cantidadLibros >= $libro->Existencias){
                $libro->Existencias = 0;
                $itempedido->Unidades=$libro->Existencias;
            }else{
                $libro->Existencias-=$item->cantidadLibros;
                $itempedido->Unidades=$item->cantidadLibros;
            }
            $libro->save();
            
            //continuamos con itempedido
            $subtotal = $itempedido->Unidades*$item->precioLibro;
            $itempedido->PrecioTotal=$subtotal;
            $total+=$subtotal;
            
            
            $itempedido->save();
            
        }
        
        $pedido->TotalCargo = $total;
        $igv = $total/((100+ 18)/100);
        $pedido->IGV = $total-$igv;
        $pedido->PrecioSinIGV = $igv;
        
        $pedido->save();
        
        
        //borrar la cesta
        $cesta->delete();
    }

}
