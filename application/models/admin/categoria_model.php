<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria_model
 *
 * @author Sadhu
 */
class Categoria_model extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function get_categorias($cad="") {   
        $sql="SELECT * FROM categoria WHERE Nombre LIKE '%$cad%'";
        $consulta=$this->db->query($sql);
        return $consulta->result();
    }
    
    
    public function eliminar($id){
        $sql="DELETE FROM categoria WHERE id=$id";
        return $this->db->query($sql);
        
    }
        public function actualizar($id) {
        $data = array(
            'Nombre' => $this->input->post('nombre'),
        );
        $this->db->where('id', $id);
        $this->db->update('categoria', $data);
    }

    public function insertar() {
        $data = array(
            'Nombre' => $this->input->post('nombre'),
        );
        $this->db->insert('categoria', $data);
    }

    public function get($id) {
        $sql = $this->db->get_where('categoria', array('id' => $id))->row();
        return $sql;
    }
}

?>
