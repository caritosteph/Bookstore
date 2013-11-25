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
         $this->load->database();
    }
    
    public function get_categorias($cad="", $pag=0) { 

        $sql="SELECT * FROM categoria WHERE Nombre LIKE '%$cad%' LIMIT $pag,".POR_PAGINA;
        $consulta=$this->db->query($sql);
        return $consulta->result();
    }
    
    public function get_total($cad="") {
        $sql="SELECT * FROM categoria WHERE Nombre LIKE '%$cad%'";
        $consulta=$this->db->query($sql);
        return $consulta->num_rows();
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
