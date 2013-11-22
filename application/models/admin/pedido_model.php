<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pedido_model
 *
 * @author Sadhu
 */
class pedido_model extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
}

?>
