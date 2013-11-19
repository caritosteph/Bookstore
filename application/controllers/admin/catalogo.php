<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of catalogo
 *
 * @author Sadhu
 */
class Catalogo extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/catalogo_model');
    }
    
    public function index() {
        
        $datos['libros']= $this->catalogo_model->get_libros();
        $datos['activo']='catalogo';
        $this->load->view('plantilla_admin/header');
        $this->load->view('admin/catalogo');
        $this->load->view('plantilla_admin/footer');
        
    }
}

?>
