<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Sadhu
 */
class Login extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $menu['activo']='catalogo';
        $this->load->view('plantilla_admin/header_login', $menu);
        $this->load->view('admin/login');
        $this->load->view('plantilla_admin/footer');
    }
}

?>
