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
class Carrito extends CI_Controller {

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
        }
        $this->load->view('plantilla/plantilla', $data);
    }

    public function agregar() {
        $id_libro = $this->input->post('id', true);
        $cantidad = $this->input->post('qty', true);
        $cantidad = $cantidad ? $cantidad : '1';


        foreach ($this->cart->contents() as $items) {
            if ($items['id'] == $id_libro) {
                $data = array(
                    'rowid' => $items['rowid'],
                    'qty' => $items['qty'] + $cantidad
                );
                $this->cart->update($data);
                redirect('catalogo/index', 'Location');
            }
        }
        $cantidad = $this->input->post('qty', true);
        $cantidad = $cantidad ? $cantidad : '1';
        $data = array(
            'id' => $id_libro,
            'qty' => $cantidad,
            'price' => $this->input->post('price', true),
            'name' => $this->input->post('name', true)
        );
        $this->cart->insert($data);

        //redireccionar en vez de llamar al index
        redirect('catalogo/index', 'Location');
    }

    public function borrarElemento($id) {
        $data = array(
            'rowid' => $id,
            'qty' => 0
        );
        $this->cart->update($data);
        redirect('carrito/', 'Location');
    }

    public function actualizarElemento() {
        $id = $this->input->post('id', true);
        $cant = $this->input->post('cant', true);
        if ($cant > 0) {
            $data = array(
                'rowid' => $id,
                'qty' => $cant
            );
            $this->cart->update($data);
            $this->index();
        }
    }

}
