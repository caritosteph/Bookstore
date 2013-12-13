<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carrito
 *
 * @author Cristian
 */
class Carrito_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form_helper');
    }

    public function index() {
        $data['activo'] = 'carrito';
        if ($this->session->userdata('cliente') == FALSE) {
            $data['contenido'] = 'visitante/carrito';
        } else {
            $data['contenido'] = 'cliente/carrito';
            //mostrar el carrito
            $cesta = new Cesta();
            $cliente = $this->session->userdata('cliente');
            $data['items'] = $cesta->todos_los_items($cliente['id']);
        }
        $this->load->view('plantilla/plantilla', $data);
    }

    public function agregar() {
        $id_libro = $this->input->post('id', true);
        $cantidad = $this->input->post('qty', true);
        $cantidad = $cantidad ? $cantidad : '1';


        $cesta = new Cesta();
        $cliente = $this->session->userdata('cliente');
        $cesta->where('ClienteID', $cliente['id']);
        $cesta->get();
        if ($cesta->exists() == FALSE) {
            $cesta->ClienteID = $cliente['id'];
            $cesta->save();
        }

        $item = new Itemcesta();
        $item->where('CestaID', $cesta->id);
        $item->where('LibroID', $id_libro);
        $item->get();

        if ($item->exists()) {
            $item->CantidadUnidades += $cantidad;
        } else {
            $item->CestaID = $cesta->id;
            $item->LibroID = $id_libro;
            $item->CantidadUnidades = $cantidad;
        }
        $item->save();

        redirect('catalogo', 'Location');
    }
    
    public function borrarElemento($id) {

        $item = new Itemcesta();
        $item->where('id', $id);
        $item->get()->delete();
        redirect('carrito', 'Location');
    }
    public function borrarTodo(){
        $cesta = new Cesta();
        $cliente = $this->session->userdata('cliente');
        $cesta->where('ClienteID', $cliente['id']);
        $cesta->get()->delete();
        redirect('carrito', 'Location');
    }
    public function actualizarElemento() {
        $id = $this->input->post('id', true);
        $cant = $this->input->post('cant', true);
        $item = new Itemcesta();
        $item->where('id', $id);
        $item->get();
        $item->CantidadUnidades = $cant;
        $item->save();
    }
    public function pedido(){
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
        $pedido->Estado=4;
        $pedido->FechaRecogo=$this->input->post('fecha',true);
        
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
        redirect(base_url().'catalogo');
    }
}
