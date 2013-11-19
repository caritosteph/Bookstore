<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cliente
 *
 * @author Sadhu
 */
class Cliente extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->view('plantilla_admin/header');
        $this->load->view('plantilla_admin/footer');
    }
}

?>
