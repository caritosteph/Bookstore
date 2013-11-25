<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeController
 *
 * @author Cristian
 */
class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();        
    }

    public function index() {
        $data['contenido']='visitante/index';
        $data['activo'] = 'inicio';
        $this->load->view('plantilla/plantilla',$data);
    }
    
    public function prueba(){
        $l = new Libro();
        $l->get();
        foreach ($l as $libro) {
            echo $libro->categoria->get();
        }
    }

}
