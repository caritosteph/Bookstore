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

}
