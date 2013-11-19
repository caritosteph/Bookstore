<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cliente_model
 *
 * @author Sadhu
 */
class cliente_model extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_clientes() {
        $sql='SELECT * from cliente';
        $consulta=$this->db->query($sql);
        return $consulta->result();
 
    }




}

?>
