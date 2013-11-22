<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria
 *
 * @author Carito
 */
class Categoria extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $menu['activo']='categoria';
        
        $this->load->view('plantilla_admin/header',$menu);
        $this->load->view('admin/categoria');
        $this->load->view('plantilla_admin/footer');
    }
}

?>
