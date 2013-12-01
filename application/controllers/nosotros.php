<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of nosotros
 *
 * @author Carito
 */
class nosotros extends CI_Controller {
    public function __construct() {
        parent::__construct();        
    }

    public function index() {
        $data['contenido']='visitante/nosotros';
        $data['activo'] = 'nosotros';
        $this->load->view('plantilla/plantilla',$data);
    }

}

